<?php

require_once __DIR__ . '/../vendor/autoload.php';
use bddapp\bd\Eloquent as Eloquent;


Eloquent::start(__DIR__ . '/config/db.config.ini');

echo ' <br> <br> Question 1 <br> ';
$temp = microtime(true);
$games = \bddapp\model\game::all();
$temp2 = microtime(true);

echo("requete 1 :" . $temp2 - $temp);

echo '<br> Question 2 <br> ';
$temp = microtime(true);
$games = \bddapp\model\game::where('name','like','%Mario%')->get();
$temp2 = microtime(true);

echo("requete 2 :" . $temp2 - $temp);

echo '<br> Question 3 <br> ';
$temp = microtime(true);
$games = \bddapp\model\game::where('name','like','Mario%')->get();
foreach($games as $game) {
    $chars = $game->character()->get();
}
$temp2 = microtime(true);
echo("requete 3 :" . $temp2 - $temp);


echo '<br> Question 4 <br> ';
$temp = microtime(true);
$games = \bddapp\model\game::where('name','like','Mario%')->wherehas('rating', function ($q){
    $q->where('name','Like','%3+%');
})->get();
$temp2 = microtime(true);
echo("requete 4 :" . $temp2 - $temp);


echo '<br> Question 1.2.1 <br> ';
$temp = microtime(true);
$games = \bddapp\model\game::where('name','like','%Mario')->get();
$temp2 = microtime(true);

echo("requete a :" . $temp2 - $temp);

$temp = microtime(true);
$games = \bddapp\model\game::where('name','like','%Sonic')->get();
$temp2 = microtime(true);

echo("requete b :" . $temp2 - $temp);

$temp = microtime(true);
$games = \bddapp\model\game::where('name','like','%ball')->get();
$temp2 = microtime(true);

echo("requete c :" . $temp2 - $temp);

