<?php

namespace OloloCms\Controllers;

use OloloCms\Core\Controller;
use OloloCms\Utils\Tasks\Task1Logic;

/**
 *
 */
class TaskController extends Controller
{

    public function taskList()
    {
        return $this->twig->render('tasks/tasks.twig');
    }

    public function task1()
    {
    	$bbString = $this->request->get('bbString');
        if ($bbString) {
            list($bbTagData,$bbTagDescription) = Task1Logic::getBBCodes($bbString);

            return $this->twig->render('tasks/task1.twig', array(
                'showResult' => true,
                'codes' => $codes,
                'bbTagData' => $bbTagData,
                'bbTagDescription' => $bbTagDescription,
            ));
        }

        return $this->twig->render('tasks/task1.twig');
    }
}
