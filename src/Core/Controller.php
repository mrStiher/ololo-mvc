<?php

namespace OloloCms\Core;

/**
 *
 */
abstract class Controller
{
    protected $twig;
    protected $request;

    public function __construct($request, $twig)
    {
        $this->request = $request;
        $this->twig = $twig;
    }

}
