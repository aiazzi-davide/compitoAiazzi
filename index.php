<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

function autoloader($class) {
    $dir = ['', '/controllers', 'src'];
    foreach ($dir as $d) {
        $file = __DIR__ . '/' . $d . '/' . $class . '.php';
        if (file_exists($file)) {
            require $file;
            return;
        }
    }
}
spl_autoload_register('autoloader');

$app = AppFactory::create();

$app->get('/', 'ControllerIndex:getIndex');
$app->get('/negozio', 'ControllerNegozio:getNegozio');
$app->get('/articoli', 'ControllerArticoli:getArticoli');
$app->get('/articoli/{id}', 'ControllerArticoli:getArticoli');
$app->get('/ordini', 'ControllerOrdini:getOrdini');
$app->get('/ordini/{id}', 'ControllerOrdini:getOrdini');
$app->get('/ordini/{id}/articoli_venduti', 'ControllerOrdini:getArticoliVenduti');
$app->get('/ordini/{id}/articoli_venduti/{idArt}', 'ControllerOrdini:getArticoloVenduto');
$app->get('/ordini/{id}/verifica', 'ControllerOrdini:verifica');
$app->get('/ordini/{id}/sconto', 'ControllerOrdini:sconto');

$app->run();
