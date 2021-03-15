<?php

$time_start = microtime(true);

// Attend pendant un moment
usleep(100);

$time_end = microtime(true);
$time = $time_end - $time_start;

echo "Ne rien faire pendant $time secondes\n";

/*
 * Q2
 * Un index permet d'accélérer la recherche dans une table en associant un numéro (index) à un ensemble de valeurs.
 * Un index permet de trier des valeurs qui ne peuvent être triées selon un ordre intelligible.
 * Les index sont stockés dans un arbre-tri qui tri les index dans l'ordre croissant.
 * On lance la recherche sur l'arbre qui les lignes inutiles.
 *
 * 2.1
 * La structure du log de requête est un tableau de requete, chaque requete est elle même un tableau composée de
 * plusieurs élément comme la requête et les bindings effectué sur elle ainsi que son temps d'éxecution
 *
 * 2.2
 * Le problème des n+1 query c'est que cela prend beaucoup de temps car elle réfèrent chacune à une autre table et cela
 * peut s'enchainer entre les tables sur plusieurs fois (boucle infini)
 */