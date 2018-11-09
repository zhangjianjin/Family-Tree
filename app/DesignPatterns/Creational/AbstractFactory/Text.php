<?php

namespace DesignPatterns\Creational\AbstractFactory;

abstract class Text
{
	/**
	  * @var string
	  */
	private $text;

	public function _construct(string $text)
	{
		$this->text = $text;
	}
}