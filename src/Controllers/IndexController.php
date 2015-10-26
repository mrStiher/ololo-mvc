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
		return $this->twig->render('index.twig', array('name' => 'Fabien'));
	}

	public function about()
	{
		return $this->twig->render('about.twig');
	}

	public function notFound()
	{
		$this->twig->render('index.twig', array('name' => 'Not found'));
	}
}
