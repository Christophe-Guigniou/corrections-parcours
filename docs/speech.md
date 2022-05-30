# Speech

## Introduction

Tu viens d'arriver dans une petite entreprise en tant que développeur Laravel et React. L'équipe passe beaucoup de temps à **chiffrer des projets**. 
Entre le type de projet, les types de développements, le type de design, les développements très spécifiques etc. ce n'est pas toujours évident :sweat: 

Pour te mettre en jambe, ton lead dev te propose de faire un **outil sur mesure** pour estimer les temps d'un projet en fonction de ce que souhaitent les clients. :sunglasses:

## Pitch de ton lead

Son idée c'est d'avoir une **interface simple** avec un formulaire permettant de renseigner plusieurs informations :
- Un champ permettant de donner le **nom du projet**
- Un champ permettant de choisir le **type de projet** : 
  - *Laravel* ou *Laravel + React*
- Un champ permettant de choisir le **type de design** : 
  - *Simple*, *Complexe* ou *Complexe avec animations*
- Des checkboxes pour cocher des **développements classiques**, dont vous connaissez déjà les temps de dev: 
  - Homepage
  - Page éditorial
  - Événements
  - Offres d'emplois
  - etc.
- (bonus) La possibilité d'ajouter des développements spécifiques avec le temps que prennent chacun

À la soumission du formulaire, un algo calcul le temps total du projet et retourne le temps total ainsi que les temps par développements et les temps additionnels occasionnés par le type de projet et type de design.

Ton lead a déjà réfléchit au projet et t'a fait une intégration disponible dans le dossier `integration` ici présent :star:
Sens-toi libre de l'améliorer si tu le souhaites ! 

**Tu devras développer ce projet en Laravel + React.**

**Côté React**, 3 pages : 
- La page d'accueil doit contenir le formulaire d'estimation de temps
- Une page de listing des estimations
- Une page de résultat d'estimation, qui servira pour le résultat après calcul et aussi pour le détail des estimations déjà effectuées.
- Les labels, valeurs et types de champs devront provenir du backend (de la BDD) pour, à terme, pouvoir être administrable depuis le back-office. Cela permettra notamment de pouvoir ajouter de nouveaux développement génériques. (pas prévu dans le parcours)

**Côté Laravel**: 
- Toutes les routes seront des routes d'API, qui seront utilisées par React
- C'est de ce côté que tu devras faire l'algo d'estimation de temps avec les données envoyées par le front

## Détail sur les temps estimés par l'équipe

Tu peux retrouver ci-dessous les règles de gestion de cet outil

### Mise en route du projet

En fonction des technos les temps de mises en places ne seront pas les mêmes

- Mise en route d'un projet full Laravel: **4h**
- Mise en route d'un projet Laravel + React: **6h**

### Les temps par développements

Génériques:
- Une page d'accueil: **7h**
- Une page de type éditorial: **5h**
- Évènements: **14h**
- Offres d'emplois: **16**
- Blog: **10h**

Additionnels:
- Pour un projet avec React, les temps de développements total sont augmentés de **25%**
- En fonction du type du design, le temps total de développement du frontend est adapté : 
  - Design simple : **0%** supplémentaire
  - Complexe : **15%** supplémentaire
  - Complexe avec animations : **20%**

:warning: Attention, les pourcentages doivent être additionnés avant d'être appliqué sur le total, et pas calculés les uns après les autres sur le total.

ex:
```
temps_total=100
pourcentage_type_projet=25
pourcentage_type_design=15
pourcentage_total = pourcentage_type_projet + pourcentage_type_design

temps_total += temps_total * pourcentage_total / 100
```

### Un peu de pratique avant :muscle:

Avant de commencer : ton __Lead dev__ te demande aussi de :
- Faire le diagramme entité relation à partir du schéma qu'il a rapidement fait sur un outil en ligne. Tu dois le faire avec **Plant UML**.
  - Son schéma est vraiment simpliste et il manque les cardinalités et relation, n'oublies rien :smirk:
  - [Schema ici](./diagramme/schema.png)
- Faire l'algo du calcul d'une estimation en (*presque*) [pseudo-code](https://fr.wikipedia.org/wiki/Pseudo-code). Ça te permettra de le pratiquer avant de le faire dans un vrai projet. C'est souvent une bonne idée pour enlever toute complexité ajoutée par un framework. 
  - Info: on dit ici "pseudo-code" mais tu devras le faire en PHP pur. 
  - [Ça se passe ici](./algo/index.php)

### Bonus
<details>
  <summary> Vraiment si tu as le temps !</summary>
Tout ne peut pas rentrer dans les critères plus haut, c'est pourquoi, tu dois aussi pouvoir estimer spécifiquement certaines fonctionnalités, en fonction des besoins client. 

Par exemple, ajouter un module météo sur le site. L'application ne pourra pas deviner le temps à passer dessus. Il faut donc ajouter un bouton pour pouvoir ajouter un groupe de champs autant de fois qu'on veut avec les champs suivant : 

Ces champs sont : 
- Nom : le nom du développement
- Temps ou Heures : Le nombre d'heures a passer dessus
</detail>




