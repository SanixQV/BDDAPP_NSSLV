<?php

require_once __DIR__ . '/../vendor/autoload.php';
use bddapp\bd\Eloquent as Eloquent;
use bddapp\model\game;
use bddapp\model\user;

Eloquent::start(__DIR__ . '/config/db.config.ini');

/**
$u = new User();
$u->email = "Louis.saget@gmail.com";
$u->nom = "saget";
$u->prenom = "Louis";
$u->adresse = " Ici ou là bas";
$u->numero = "0606060606";
$u->dateNaissance ="30/02/1985";
$u->save();

$u = new User();
$u->email = "Quentin.Vrignon@gmail.com";
$u->nom = "Vrignon";
$u->prenom = "Quentin";
$u->adresse = " Ici ou là bas";
$u->numero = "0606060607";
$u->dateNaissance ="30/02/1989";
$u->save();

$c = new \bddapp\model\commentaire();
$c->titre = "essai";
$c->email = "Louis.saget@gmail.com";
$c->contenu ="Commentaire 1 de Louis";
$c->idJeu =12342;
$c->save();


$c = new \bddapp\model\commentaire();
$c->titre = "essai1";
$c->email = "Louis.saget@gmail.com";
$c->contenu ="Commentaire 2 de Louis";
$c->idJeu =12342;
$c->save();

$c = new \bddapp\model\commentaire();
$c->titre = "essai2";
$c->email = "Louis.saget@gmail.com";
$c->contenu ="Commentaire 3 de Louis";
$c->idJeu =12342;
$c->save();

$c = new \bddapp\model\commentaire();
$c->titre = "essai11";
$c->email = "Quentin.Vrignon@gmail.com";
$c->contenu ="Commentaire 1 de Quentin";
$c->idJeu =12342;
$c->save();

$c = new \bddapp\model\commentaire();
$c->titre = "essai12";
$c->email = "Quentin.Vrignon@gmail.com";
$c->contenu ="Commentaire 1 de Quentin";
$c->idJeu =12342;
$c->save();

$c = new \bddapp\model\commentaire();
$c->titre = "essai13";
$c->email = "Quentin.Vrignon@gmail.com";
$c->contenu ="Commentaire 1 de Quentin";
$c->idJeu =12342;
$c->save();
 * */

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();

for( $i =0; $i <25000;$i++){
    $u = new User();
    $u->nom = $faker->name();
    $u->adresse = $faker->address();
    $u->prenom = $faker->name();
    $u->email = $faker->email();
    $u->numero = $faker->phoneNumber();
    $u->dateNaissance = $faker->dateTime(2015);
    $u->save();
    for( $j =0; $j <10;$j++){
        $c = new \bddapp\model\commentaire();
        $c->titre = $faker->text(10);
        $c->contenu =$faker->text();
        //$c->idJeu = $faker->numberBetween(1,12342);
        $g = Game::find($faker->numberBetween(1,12342));
        $c->save();
        $c->game()->associate($g);
        /////
        $u->commentaires()->save($c);
    }
}



