<?php

require_once __DIR__ . '/../vendor/autoload.php';
use bddapp\bd\Eloquent as Eloquent;
use bddapp\model\game;
use Illuminate\Database\Capsule\Manager as DB;

Eloquent::start(__DIR__ . '/config/db.config.ini');
DB::connection()->enableQueryLog();

echo '<br> Question 1 <br> ';
$games = \bddapp\model\game::where('name','like','%Mario%')->get();
foreach ($games as $game){
    echo $game->id;
}


echo '<br> Question 2 <br> ';
$games = \bddapp\model\game::where('id','=','12342')->get();


foreach($games as $game) {
    $chars = $game->character()->get();
}

echo ' <br> <br> Question 3 <br> ';
$games = game::where('name','like','%Mario%')->get();
foreach($games as $game){
    $chars = $game->FACharacter()->get();
    foreach($chars as $char){
        echo $char->name . ' ';
        echo '<br>';
    }
}


/**
 * affichage du log de requêtes
 */
$i=0;
foreach (DB::getQueryLog() as $q) {
    echo "-------------- <br>";
    $i+=1;
    var_dump($q);
};

echo ($i);