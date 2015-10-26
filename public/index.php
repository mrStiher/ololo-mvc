<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new OloloCms\Application();

try {
	echo $app->run();
} catch (Exception $e) {
	echo 'Возникла ошибка';
}

