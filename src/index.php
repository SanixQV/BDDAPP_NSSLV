<?php
require_once __DIR__."/../vendor/autoload.php";
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

$photos = bddapp\Model\Annonce::find('22');
echo "<br> <br> Question 1 <br>";
$photos =  $photos->photo()->get();
foreach ($photos as $photo) {
    echo $photo;
}
echo "<br> <br> Question 2 <br>";
$photos2000 = bddapp\Model\Annonce::find('22');
$photos2000 = $photos2000->photo()->where('tailleOctets','>','100000')->get();

foreach ($photos2000 as $photo) {
    echo $photo;
}

echo "<br> <br> Question 3 <br>";
$Annonce = bddapp\Model\Photo::select('*', DB::raw('COUNT(idPhoto) as review_count'))
                                   ->groupBy('idAn')
                                   ->having('review_count', '>=' , 3)
                                   ->get();
echo $Annonce;


echo "<br> <br> Question 4 <br>";
$phot = bddapp\Model\Photo::where('tailleOctets','>','100000')->get();
foreach($phot as $a){
$photos2000 = $a->annonce()->get();
echo $photos2000;
}



$item = new bddapp\Model\Photo();
$item->idPhoto = 7;
$item->idAn = 22;
$item->file = 'Mangas';
$item->date = '2021-03-25';
$item->tailleOctets = 20000000;
$item->save();
