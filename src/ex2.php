<?php
require_once __DIR__ . '/../vendor/autoload.php';
use bddapp\bd\Eloquent as Eloquent;
use bddapp\model\game;

Eloquent::start(__DIR__ . '/config/db.config.ini');


echo ' <br> <br> Question 1 <br> ';
$game = game::find(12342);
$chars = $game->character()->get();
foreach($chars as $char){
    echo $char->name . ' ';
    echo $char->deck . ' ';
    echo '<br>';
}
echo ' <br> <br> Question 2 <br> ';
$games = game::where('name','like','Mario%')->get();
foreach($games as $game){
    $chars = $game->character()->get();
    foreach($chars as $char){
        echo $char->name . ' ';
        echo '<br>';
    }
}

echo ' <br> <br> Question 3 <br> ';
$comps = \bddapp\model\Company::where('name','like','%Sony%')->get();
foreach($comps as $comp){
    $games = $comp->game()->get();
    foreach($games as $game){
        echo $game->name . ' ';
        echo '<br>';
    }
}

echo ' <br> <br> Question 4 <br> ';

$games = game::where('name','like','%Mario%')->get();
foreach($games as $game){
    $rates = $game->rating()->get();
    echo $game->name .' <br> ';
    foreach($rates as $rate){
        if(isset($rate)) {
            echo $rate->name . '<br>';
            $rateB = $rate->rating_board()->get();
            echo $rateB;
        }
    }
}

echo ' <br> <br> Question 5 <br> ';
$games = game::where('name','like','Mario%')->has('character','>','3')->get();
foreach($games as $g){
    echo $g->name;
}

echo ' <br> <br> Question 6 <br> ';
$games = game::where('name','like','Mario%')->get();
foreach($games as $game){
    $rates = $game->rating()->where('name','Like','%3+')->get();
    foreach($rates as $rate){
        if(isset($rate)) {
            echo $game->name .' <br> ';
            echo $rate->name . '<br>';
        }
    }
}

echo ' <br> <br> Question 7 <br> ';
$games = game::where('name','like','Mario%')
        ->wherehas('company', function ($q){
            $q->where('name', 'like', '%Inc.%');
        })
        ->wherehas('rating', function ($q){
            $q->where('name','Like','%3+%');
        })->get();
foreach($games as $game){
    echo $game->name .' <br> ';
}


echo ' <br> <br> Question 8 <br> ';
$games = game::where('name','like','Mario%')
        ->wherehas('company', function ($q){
            $q->where('name', 'like', '%Inc.%');
        })
        ->wherehas('rating', function ($q){
            $q->where('name','Like','%3+%');
        })
        ->wherehas('rating.rating_board', function ($q){
                $q->where('name', 'like', '%CERO%');
        })->get();

foreach($games as $game){
    echo $game->name .' <br> ';
}

echo ' <br> <br> Question 9 <br> ';
$game = game::find(12);
$genre = new bddapp\model\genre();
$genre->name = 'Question9';

//$game->genre()->save($genre);

$genre = bddapp\model\genre::find(52);
$genre->games()->attach( [56,345]);



$games = game::wherehas('genre', function ($q){
    $q->where('id', '=', '52');
})->get();
foreach($games as $game){
        echo $game->id . ' ';
}