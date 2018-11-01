<?php

return [
    'alipay' => [
        'app_id'         => '2016092200566816',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAseKIOypRKY3pT+u1dspLaQB8b0F9DEuqee2/rZT9QZKSJbjajco4zj5bWSL4FKghPWLOwYDWfieUgJHAxxJmqFmpXUWMxsOU9EKq5Xd4kln2JYgX5D4T22JNC98K4QWoaKtvFIi2ccIHaRxNtNVIuqTSxEiQeIBb+rCWG1FD5EvkKIsgTlOxgxf0qsUwYXMpXvf2JB1LJ0iCXao3SIJERjRjDnrZdmF9rzoT9poT4akQsxYKXD0jemD40frN7Ir0oTljyr9hUKLbDGUfGC/6VBe62wi7KxhfSx8NX9LIeJzng/yTImuN6Mgnk2cGjdmYuUIrEhd3F/tim87tSDGEowIDAQAB',
        'private_key'    => '',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];