<?php

namespace OloloCms\Core\Network;

/**
* Класс обработки запросов
*/
class Request
{
	public function getUrl()
	{
		return $_SERVER['REQUEST_URI'];
	}


}