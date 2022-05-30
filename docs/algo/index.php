<?php
/*
Créer l'algo qui permettra de calculer une estimation de temps par rapport à un jeu de données envoyées.

Ouvre ce fichier dans ton navigateur, ou lance un serveur php avec la commande : "php -S localhost:8000 -t ." en étant placé dans ce dossier.

Analyse le résultat attendu. Les contenus d'exemple seront automatiquement enlevés dès que tu fourniras des valeurs dans les tableaux `lines` et `additional`.

Chaque entrée dans `lines` et `additional` devra avoir cette form : 

    [
        "name" => "Nom du dev",
        "time" => "temps en minute", // => 340
    ]

Les temps sont exprimés en minutes.

- "total_percentage" correspond au pourcentage à appliquer sur le total
- "startup_time" correspond au temps nécessaire à la mise en place du projet. Ce temps de mise en place devra être en première ligne du tableau.

Dans la partie "additional", il faudra ajouter des entrées pour les temps supplémentaires en fonction du type de design et type de projet, même si ces temps additionnels sont égal à "0". On ne veut pas ici le pourcentage de temps supplémentaire, mais le temps supplémentaire occasionné, en minutes.

*/


/**
 * Règles de gestion
 */
$designTypes = [
    'simple' => [
        'total_percentage' => 0
    ],
    'complex' => [
        'total_percentage' => 10
    ],
    'complex_animations' => [
        'total_percentage'  => 15
    ]
];

$projectTypes = [
    'laravel' => [
        'startup_time' => 240,
        'total_percentage' => 0
    ],
    'laravel_react' => [
        'startup_time' => 360,
        'total_percentage' => 15
    ]
];

$genericDevelopments = [
    'homepage' => 420,
    'events' => 840,
    'blog' => 600,
    'jobs' => 960,
    'editorial' => 300,
];
// fin des règles de gestion


/**
 * Jeux de données de test
 */
$dataSentArray = [
    [
        'designType' => 'complex',
        'projectType' => 'laravel_react',
        'genericDevelopments' => [
            'homepage', 'editorial', 'blog', 'jobs'
        ]
    ],
    [
        'designType' => 'complex_animations',
        'projectType' => 'laravel_react',
        'genericDevelopments' => [
            'homepage', 'jobs'
        ]
    ],
    [
        'designType' => 'simple',
        'projectType' => 'laravel',
        'genericDevelopments' => [
            'homepage', 'jobs', 'events', 'blog', 'editorial'
        ]
    ]
];


/**
 * Algo
 */

/* 
Change l'index ici si tu veux tester avec un autre jeu de donnée du tableau ci-dessus.

L'index "0" correspond à :
[
    'designType' => 'complex',
    'projectType' => 'laravel_react',
    'genericDevelopments' => [
        'homepage', 'editorial', 'blog', 'jobs'
    ]
],

*/
$dataSent = $dataSentArray[0];

// -------------- Ton algo ici --------------


// Le résultat devra avoir cette forme, à toi de remplir le total, 
// le tableau de lignes et les lignes de temps additionnel.
$result = [
    'total' => 0,
    'lines' => [],
    'additional' => []
];

// -------------- Fin de ton algo ------------

// Ne pas toucher ci-dessous
include('functions.php');
display_result($result);
