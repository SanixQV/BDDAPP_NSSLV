<?php

/**
 * File:  1.php
 * Creation Date: 04/01/2016
 * description:
 *
 * @author: canals
 */

require_once 'vendor/autoload.php';

use bddapp\bd\Eloquent;



use Illuminate\Database\Capsule\Manager as DB;


/**
 *   configurer la connexion à la base  ...
 */
/*
 * logging des requêtes
 * activer le logging
 * exécuter les requêtes
 * afficher le log
 */
Eloquent::start(__DIR__ . '/src/config/db.config.ini');
DB::connection()->enableQueryLog();
/**
 *  les jeux dont le nom contient Mario
 */

\bddapp\model\game::where('name', 'like', '%Mario%')->get();

/*
 * nom des persos du jeu 12342
 */

foreach (\bddapp\model\game::find(12342)->characters as $c)
    echo "- perso : " . $c->name . "<br>";


/**
 * affichage du log de requêtes
 */

foreach (DB::getQueryLog() as $q) {
    echo "-------------- <br>";
    var_dump($q);
};
