<?php

namespace DesignPatterns\Creational\AbstractFactory;

use DesignPatterns\Creational\AbstractFactory;

class JsonFactory extends AbstractFactory
{
	public function createText(string $content): Text
	{
		return new JsonText($content)；
	}
}