<?php

use App\Tree;
use Faker\Generator as Faker;

$factory->define(Tree::class, function (Faker $faker) {
    $treeNames = ['Red Delicious', 'Cedar Elm', 'Fireberry Hawthorn', 'Firmleaf willow'];
    $species = ['Malus Domestica', 'Moluccensis', 'Chrysocarpa', 'Pseudomyrsinites', 'angophoroides'];

    return [
        'name' => array_random($treeNames),
        'species' => array_random($species),
        'genus' => array_random(Tree::getEnum('genus')),
        'family' => array_random(Tree::getEnum('family')),
        'habitat' => array_random(Tree::getEnum('habitat')),
        'notes' => $faker->paragraph,
    ];
});
