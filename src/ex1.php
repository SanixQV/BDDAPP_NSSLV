<?php
require_once __DIR__ . '/../vendor/autoload.php';
use bddapp\bd\Eloquent as Eloquent;
Eloquent::start(__DIR__ . '/config/db.config.ini');

$liste = \bddapp\model\game::where('name','like','%mario%')->get();

foreach($liste as $game){
    //echo $game->name. ' : ' . $game->alias . '<br>';
}

$liste = \bddapp\model\Company::where('location_country','=','Japan')->get();

foreach($liste as $company){
    //echo $company->name . '<br>';
}
$liste = \bddapp\model\Platform::where('install_base','>=','10000000')->get();
foreach($liste as $platform){
    //echo $platform->name .'<br>';
}

$liste = \bddapp\model\game::where([['id','>=','21173'],['id','<','21615']])->get();
$i = 0;
foreach($liste as $game){
    //echo $game->id . ' : '.$game->name .'<br>';
    $i++;
}
//echo $i;


$liste = \bddapp\model\game::all();
$i=0;
$html = 'page 1 <br>';
$p = 2;
foreach($liste as $game){
    if($i == 500){
        $i=0;
        $html .= 'page '. $p. '<br>';
        $p++;
    }
    $i++;
    $html.=$game->name . ' : '.$game->deck.'<br>';
}
echo $html;
