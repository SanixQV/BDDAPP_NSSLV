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
$app->get('/api/games/{idGames}/comments[/]',function(Request $rq,Response $rs,array $args){
    $c = new \bddapp\controller\ControllerGame($this);
    return $c->getCommFromIdGames($rq,$rs,$args);
})->setName('infoGamesComme');

$app->post('/api/games/{idGames}/comments[/]',function(Request $rq,Response $rs,array $args){
    $c = new \bddapp\controller\ControllerComms($this);
    return $c->postComm($rq,$rs,$args);
})->setName('postComm');

$app->get('/api/games/{idGames}/characters',function(Request $rq,Response $rs,array $args){
    $c = new \bddapp\controller\ControllerGame($this);
    return $c->getCharacterFromId($rq,$rs,$args);
})->setName('infoGamesChar');

$app->get('/api/games/{idGames}[/]', function(Request $rq,Response $rs,array $args){
    $c = new \bddapp\controller\ControllerGame($this);
    return $c->getInfoFromId($rq,$rs,$args);
})->setName('infoGamesId');

$app->get('/api/character/{idchar}[/]', function(Request $rq,Response $rs,array $args){
    $c = new \bddapp\controller\ControllerCharacter($this);
    return $c->getInfoFromIdGames($rq,$rs,$args);
})->setName('infoChar');

$app->get('/api/comments/{idcom}[/]', function(Request $rq,Response $rs,array $args){
    $c = new \bddapp\controller\ControllerComms($this);
    return $c->getInfoCom($rq,$rs,$args);
})->setName('infoCom');


$app->get('/api/games[/]',function(Request $rq,Response $rs,array $args){
    $c = new \bddapp\controller\ControllerGame($this);
    return $c->getCollectionGame($rq,$rs,$args);
})->setName('infoGames');





$app->run();