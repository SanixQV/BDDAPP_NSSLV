<?php
require_once __DIR__."../../../vendor/autoload.php";
use Illuminate\Database\Capsule\Manager as DB;
$db = new DB();
print ("eloquent est installe ! \n");

$db->addConnection([
	'driver' => 'mysql',
	'host' => 'localhost',
	'database' => 'preparations2',
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci',
]);

$db->setAsGlobal();
$db->bootEloquent();
print "connecté à la base de données\n";

$photos = wishlist\PrepaS2\Model\Annonce::find(1)->photo()->where('idAn', '22')->get();

foreach ($photos as $photo) {
    //
}

$photos2000 = wishlist\PrepaS2\Model\Annonce::find(1)->photo()->where([
			['idAn', '=', '22'],
			['taille_octets', '>', '2000']
])->get();
foreach ($photos2000 as $photo) {
    //
}

