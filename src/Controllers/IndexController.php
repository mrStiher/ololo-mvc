<?php

namespace OloloCms\Controllers;

use OloloCms\Core\Controller;

/**
 * 
 */
class IndexController extends Controller
{
	public function index()
	{
		return $this->twig->render('index.twig');
	}

	public function about()
	{
		return $this->twig->render('about.twig');
	}

	public function notFound()
	{
		return $this->twig->render('404.twig');
	}
}
