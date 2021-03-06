<?php

namespace App\Http\Controllers;

use App\Events\OrderPaid;
use Endroid\QrCode\QrCode;
use Carbon\Carbon;
use App\Models\Order;
use App\Exceptions\InvalodRequestException;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payByAlipay(Order $order, Request $request)
    {
    	// 判断订单是否属于当前用户
    	$this->authorize('own', $order);
    	// 丁订单已支付或者已关闭
    	if($order->paid_at || $order->closed){
    		throw new InvalodRequestException("订单状态不正确");
    	}

    	//调用支付宝的网页支付

    	// 调用支付宝的网页支付
        return app('alipay')->web([
            'out_trade_no' => $order->no, // 订单编号，需保证在商户端不重复
            'total_amount' => $order->total_amount, // 订单金额，单位元，支持小数点后两位
            'subject'      => '支付 Family-Tree 的订单：'.$order->no, // 订单标题
        ]);
    }

    //前端回调页面
    public function alipayReturn()
    {
    	// 校验提交的参数是否合法
    	try{
    		$data = app('alipay')->verify();
    	}catch(\Exception $e){
    		return view('pages.error', ['msg' => '数据不正确']);
    	}

    	return view('pages.success', ['msg' => '付款成功']);
    }

    // 支付宝服务端回调
    public function alipayNotify()
    {
        // 校验输入参数
        $data  = app('alipay')->verify();
        // 如果订单状态不是成功或者结束，则不走后续的逻辑
        // 所有校验状态：https://docs.open.alipay.com/59/103672
        if(!in_array($data->trade_status, ['TRADE_SUCCESS', 'TRADE_FINISHED'])) {
            return app('alipay')->success();
        }
        // $data->out_trade_no 拿到订单流水号，并在数据库中查询
        $order = Order::where('no', $data->out_trade_no)->first();
        // 正常来说不太可能出现支付了一笔不存在的订单，这个判断只是加强系统健壮性。
        if (!$order) {
            return 'fail';
        }
        // 如果这笔订单的状态已经是已支付
        if ($order->paid_at) {
            // 返回数据给支付宝
            return app('alipay')->success();
        }

        $order->update([
            'paid_at'        => Carbon::now(), // 支付时间
            'payment_method' => 'alipay', // 支付方式
            'payment_no'     => $data->trade_no, // 支付宝订单号
        ]);

        return app('alipay')->success();
    }

    public function payByWechat(Order $order, Request $request)
    {
        // 校验权限
        $this->authorize('own', $order);
        // 校验订单状态
        if($order->paid_at || $order->closed){
            throw new InvalidRequestException('订单状态不正确');
        }

        // scan方法为拉起微信扫码支付
        $wechatOrder =  app('wechat_pay')->scan([
            'out_trade_no' => $order->no,
            'total_fee'    => $order->total_amount * 100,
            'body'         => '支付 Family-Tree 的订单：'.$order->no, // 订单标题
        ]);

        //把要转化的字符串作为OrCode的构造函数参数
        $qrCode = new QrCode($wechatOrder->code_url);

        //将生产的二维码图片数据以字符串形式输出，并带上相应的相应类型
        return response($qrCode->writeString(),200, ['Content-Type' => $qrCode->getContentType]);
    }

    // 微信服务端回调
    public function wechatNotify()
    {
        // 校验回调参数是否正确
        $data = app('wechat_pay')->verify();
        // $data->out_trade_no 拿到订单流水号，并在数据库中查询
        $order = Order::where('no', $data->out_trade_no)->first();
        // 正常来说不太可能出现支付了一笔不存在的订单，这个判断只是加强系统的健壮性。
        if(!$order){
            return 'fail';
        }

        // 如果这笔订单的状态是已支付
        if($order->paid_at){
            // 返回数据给支付宝
            return app('wechat_pay')->success();
        }

        $order->update([
            'paid_at'       => Carbon::now(), //支付时间
            'payment_method'=> 'wechat',
            'payment_no'    => $data->transaction_id,
        ]);
        
        $this->afterPaid($order);

        return app('wechat_pay')->success();
    }

    protected function afterPaid(Order $order)
    {
        event(new OrderPaid($order));
    }
}
