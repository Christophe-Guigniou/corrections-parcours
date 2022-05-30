# Attendus

Tout ce qui est attendu sur ce parcours + atelier est présent sur cette page. N'hésite pas à te rendre sur cette page sur le GitHub de ton repo pour pouvoir cocher les étapes que tu as faites. :muscle:

Il sera peut être difficile de tout réaliser. On prefèrera **50% des fonctionnalités bien faites** que 100% des fonctionnalités mal faites. :hugs:


## Parcours (2j)

### Lundi matin 

Cockpit de **9h à 9h30** pour la **présentation du parcours**.

ℹ️ *Parcours conception de 9h30 à 12h30*

- [ ] Remplir les différents **Quiz**
- [ ] Faire le **diagramme d'entité/relation** de la BDD et mettre le code PlantUML correspondant + un export en image dans le fichier `docs`. Se baser sur le [schéma présent ici](./diagramme/schema.png)
- [ ] Faire **l'algo en pseudo-code** : ça se passe dans le dossier [algo](./algo/index.php)

### Lundi après-midi jusque mardi soir

Cockpit de **13h30 à 14h00** pour **débriefer la conception** avec ton lead dev et **parler de la suite**.

ℹ️ *Parcours mise en place du projet*
*lundi : dev de 14h à 17h*
*mardi : cockpit avec lead dev à 9h00*
*le reste de la journée : dev 9h30 à 12h puis 13h à 17h*

- [ ] Mettre en place le **backend** avec **Laravel**
  - [ ] Initialiser le projet dans un sous-dossier `backend` avec sail
  - [ ] Créer les **migrations**
  - [ ] Créer les **models**, *(bonus: relations)*
  - [ ] Créer les **routes**
  - [ ] Créer les **controllers** et **méthodes de routes** en retournant uniquement une réponse json contenant : `{"name":"nom de la page/route"}`. Rien d'autre en code.
  - [ ] (*bonus* : créer les **seeders**) 
- [ ] Mettre en place le **frontend** avec **React**
  - [ ] **Initialiser** le projet dans un sous-dossier `frontend`
  - [ ] **Nettoyer** les fichiers et code générés pour partir sur une page blanche
  - [ ] Créer les **composants** des différentes pages à nu
  - [ ] Créer les possibles **composants communs**
  - [ ] Mettre **l'intégration en dur** dans les différentes pages
  - [ ] *(bonus Réfléchir à quels composants créer pour les champs de formulaire et créer ces composants à nu)*
  - [ ] *(bonus du bonus : créer le composant pour les développements supplémentaires)*

**Fin du parcours :tada:**

## Atelier (3j)

Une fois toute la conception et la mise en place terminée, il est temps de coder réellement chaque fonctionnalité. 

Pour ne pas que tu sois pénalisé si tu n'as pas réussi à tout faire, nous mettons à ta disposition un nouveau O'challenge avec toute la mise en place de faite. Ce n'est pas obligatoire, mais très recommandé pour que toi et ton binôme partiez avec un code propre commun.
