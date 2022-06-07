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
$dataSent = $dataSentArray[2];

// -- Ton algo ici

/* 1. Temps de base */

// Mise en place
$startup_line = [
    'name' => 'Mise en place du projet',
    'time' => $projectTypes[$dataSent['projectType']]['startup_time']
];

// Développement des fonctionnalités génériques
$generics_lines = array_map(
    fn ($development) => [
        'name' => $development,
        'time' => $genericDevelopments[$development],
    ],
    $dataSent['genericDevelopments'],
);

// Lignes des développements (startup + generics)
$lines = [$startup_line, ...$generics_lines];

// Calcul du temps de base = sous-total des temps de développement
$subtotal = array_reduce(
    $lines,
    fn ($carry, $item) => $carry + $item['time'],
    0,
);

/* 2. Temps additionnels */
// Retourne le pourcentage à appliquer sur le total
// en fonction du jeu de données choisis
$get_total_percentage = fn ($dataSent) => fn ($types) => fn ($type) => $types[$dataSent[$type]]['total_percentage'];

// Tableau des pourcentages à appliquer
$percentage_from_dataSent = $get_total_percentage($dataSent);
$percentages = [
    'project' => $percentage_from_dataSent($projectTypes)('projectType'),
    'design' => $percentage_from_dataSent($designTypes)('designType'),
];

// Lignes des développements additionnels
$additional = array_map(
    fn ($type) => [
        'name' => 'Type de ' . $type . ' : ' . $dataSent[$type . 'Type'],
        'time' => $subtotal * $percentages[$type] / 100,
    ],
    array_keys($percentages),
);

/* 3. Calcul du total de temps */
// Temps de base + temps des additionnels
$total = round(array_reduce(
    $additional,
    fn ($carry, $item) => $carry + $item['time'],
    $subtotal,
));

// Le résultat devra avoir cette forme, à toi de remplir le total, le tableau de lignes et les lignes de temps additionnel.
$result = [
    'total' => $total,
    'lines' => $lines,
    'additional' => $additional
];

// Fin de ton algo

// Ne pas toucher ci-dessous
include('functions.php');
display_result($result);
