<?php

ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';

use bddapp\bd\Eloquent;
use Slim\App;
use Slim\Container;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$c = new Container([
    'settings'=>['displayErrorDetails' => true]
]);


$app = new App($c);

Eloquent::start(__DIR__ .'/src/config/db.config.ini');

$app->get('[/]', function(Request $rq,Response $rs,array $args){

})->setName('root');

$app->get('/api/games/{idGames}[/]', function(Request $rq,Response $rs,array $args){
    $c = new \bddapp\controller\ControllerGame($this);
    return $c->getInfoFromId($rq,$rs,$args);
})->setName('infoGamesId');

$app->get('/api/games[/]',function(Request $rq,Response $rs,array $args){
    $c = new \bddapp\controller\ControllerGame($this);
    return $c->getCollectionGame($rq,$rs,$args);
})->setName('infoGames');


$app->run();