# La Programmation Fonctionnelle (PF) en PHP

Et oui ! En PHP aussi on peut faire de la PF…

## Rappel

La PF apporte quelques notions utilisées dans cet exemple de correction :

- l'immutabilité : on ne modifie pas directement une variable
- on crée des fonctions, voire même des fonctions curryfiées !

## Immutabilité

Suivre ce principe implique plusieurs choses :

- on ne doit pas réaffecter une variable : donc les instructions du style…

    ```php
    $percentage = 0;

    $percentage += $designTypes[$design]['total_percentage'];
    $percentage += $projectTypes[$project]['total_percentage'];

    // de même pour les tableaux
    $lines = [];

    $lines[] = [
        'name' => 'Mise en place du projet',
        'time' => $projectTypes[$project]['startup_time']
    ];
    ```

    …ne sont pas autorisées

- on va devoir utiliser les _array_function_ : `array_map()`, `array_reduce()`

## Fonctions

Certaines fonctions sont obligatoires : les **lambdas**, vous vous souvenez ?
Les fonctions anonymes utilisées comme _callback_ des fonctions sur les tableaux.

Ces lambdas peuvent avoir plusieurs formes :

- fonctions anonymes

    ```php
    $newArray = array_map(
      function ($item) {
        return 'something';
      },
      $initialArray
    );
    ```

- fonctions fléchées

    ```php
    $newArray = array_map(
      fn ($item) => 'something',
      $initialArray
    );
    ```

### Fonctions fléchées

> [Documentation](https://www.php.net/manual/fr/functions.arrow.php)

```text
# syntaxe
fn (argument_list) => expr
```

`fn` est un « mot-clé » pour signifier qu'il s'agit d'une fonction fléchées

En PHP, les fonctions fléchées sont légèrement différentes par rapport au JS :
elle ne fonctionnent qu'avec des retours implicites :

```php
// IMPOSSIBLE → syntax error, unexpected token "{" in …
fn ($item) => {
  $item_square = $item * $item;
  return $item_square;
}

// GOOD
fn ($item) => $item * $item;
```

Les fonctions fléchées ont un avantage certain : elles « capturent » la valeur des variables du _scope_ parent (uniquement la valeur, donc ne pas modifier la variable)

```php
$additional = array_map(
    fn ($type) => [
        'name' => 'Type de ' . $type . ' : ' . $dataSent[$type . 'Type'],
        'time' => $subtotal * $percentages[$type] / 100,
    ],
    array_keys($percentages),
);
// ici `$dataSent`, `$subtotal` et `$percentages`
// sont déclarées dans le scope parent mais accessibles

// l'équivalent en fonctions anonymes serait :
$additional = array_map(
    function ($type) use ($dataSent, $subtotal, $percentages) {
      return [
          'name' => 'Type de ' . $type . ' : ' . $dataSent[$type . 'Type'],
          'time' => $subtotal * $percentages[$type] / 100,
      ];
    },
    array_keys($percentages),
);
```

### Currying

Dans la correction « impérative », pour traiter le tableau `$percentage`, on a :

```php
$percentage = 0;

$design = $dataSent['designType'];
$project = $dataSent['projectType'];

$percentage += $designTypes[$design]['total_percentage'];
$percentage += $projectTypes[$project]['total_percentage'];
```

Une première étape, pour transformer ce code en PF,
serait d'utiliser des variables intermédiaires,
puis de les ajouter et de stocker notre valeur dans notre variable `$percentage` :

```php
// $design = $dataSent['designType'];
// $project = $dataSent['projectType'];
// j'ai mis ces valeurs directement dans le code en-dessous

$percentage_design = $designTypes[$dataSent['designType']]['total_percentage'];
$percentage_project = $projectTypes[$dataSent['projectType']]['total_percentage'];

$percentage = $percentage_design + $percentage_project;
```

On voit que le code est très similaire, on recherche `total_percentage` dans 2 tableaux (presque) identique (tout du moins la structure l'est).  
On peut en faire une fonction :

```php
function get_total_percentage($dataSent, $types, $type) {
  // fonction pure : on passe tous nos besoins en paramètres
  // et, de toute façon, il y a le scope  : $dataSent ne serait pas accessible ici 
  // → PHP Warning:  Undefined variable $dataSent
  return $types[$dataSent[$type]]['total_percentage'];
}

$percentage_design = get_total_percentage($dataSent, $designTypes, 'designType');
$percentage_project = get_total_percentage($dataSent, $projectTypes, 'projectType');
```

En PF, on essaie (ou on peut essayer) de n'utiliser des fonctions qu'à un seul paramètre.  
Comme ça, on peut réutiliser ce « bout » de fonctions où on veut dans le projet.  
De plus ici, ça nous évite de passer la même variable (`$dataSent`) deux fois à la même fonction.

Pour faire ceci, on utilise la curryfication :

```php
function get_total_percentage($dataSent)
{
    return function ($types) use ($dataSent)
    {
        return function ($type) use ($dataSent, $types)
        {
            return $types[$dataSent[$type]]['total_percentage'];
        };
    };
}

$percentage_from_dataSent = get_total_percentage($dataSent);

$percentage_design = $percentage_from_dataSent($designTypes, 'designType');
$percentage_project = $percentage_from_dataSent($projectTypes, 'projectType');
```

Pour passer nos variables de _scope_ en _scope_, on multiplie les `use`…
un peu lourd et il faut faire attention de ne pas oublier une variable nécessaire pour notre dernier retour.  
On va donc utiliser les fonctions fléchées pour alléger notre code :

```php
$get_total_percentage = fn ($dataSent) => fn ($types) => fn ($type) => $types[$dataSent[$type]]['total_percentage'];
```

> Dans cette correction, la logique, notamment pour calculer le pourcentage de temps additionnel
> et calculer le temps supplémentaire correspondant, est différente.  
> Je préfère stocker les variables dans un tableau (en utilisant `array_map()`)
> puis de calculer le total grâce à `array_reduce()`.  
> Mais ça ne change rien…
