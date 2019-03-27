# Atelier

## Objectifs

- Continuer de structurer plus proprement nos données avec des classes
- Ajouter des pages "article"
- Coder chaque étape dans une **branche spécifique** puis **fusionner dans master** une fois l'étape terminée

## Rappels

- pour ne pas répéter le code HTML d'un site, on factorise et on le place dans un fichier
- ensuite, on  inclut les différents fichiers dans le bon ordre et au final, on a un code HTML correct envoyé au navigateur
- ces fichiers contenant le code HTML "découpés" s'appellent des *templates*
- une classe contient des propriétés et des méthodes
- chaque propriété et méthode peut être publique (open bar) ou privée (uniquement pour la classe) selon son utilisation/but

## Code actuel

- lire les fichiers fournis
- les classes se situent dans le dossier `inc/classes`
- les templates se situent dans le dossier `inc/templates`

## Etapes

### Etape 1 - Découper :scissors:

- créer une branche `cut-cut-cut` et se placer dedans
- à partir de l'intégration HTML/CSS faite précédemment
- découper l'intégration en templates
    - au minimum, il y aura 3 templates :wink:
- dans `index.php`, inclure dans le bon ordre ces templates
    - ces inclusions devront **toujours** être à la fin du fichier (bonne pratique)
- la page doit s'afficher correctement

### Etape 2 - Dynamiser :boom:

- se placer sur `master` et fusionner la branche `cut-cut-cut` dans master
- créer une branche `dynamiser` et se placer dedans
- charger le fichier de données
- utiliser ces données dans les templates pour dynamiser les parties suivantes :
    - les catégories en haut
    - les catégories à droite
    - les auteurs à droite
    - les articles au centre

<details><summary>Exemple avec les auteurs</summary>

```html
<!-- Auteurs: https://getbootstrap.com/docs/4.1/components/card/#list-groups -->
<div class="card">
<h3 class="card-header">Auteurs</h3>
<ul class="list-group list-group-flush">
    <?php foreach ($authors as $authorName) : ?>
    <li class="list-group-item"><?= $authorName ?></li>
    <?php endforeach; ?>
</ul>
</div>
```

</details>

<details><summary>Indice(s) pour les articles</summary>

- les articles sont tous des **Objets** de la classe _Article_
- chaque propriété contenant la donnée est publique
- donc, la syntaxe pour y accéder : `$object->propertyName`

</details>

### Etape 3 - Classe Category :sunglasses:

- se placer sur `master` et fusionner la branche `dynamiser` dans master
- créer une branche `classe-category` et se placer dedans
- comme avec les articles, on va créer une classe `Category`
- modifier le fichier `inc/data.php` pour que le tableau `$dataCategoriesList` soit un tableau d'objets `Category`
- en conséquence, modifier les templates

<details><summary>Indice(s)</summary>

- il faudra coder un ou des paramètre(s) optionnel(s) au constructeur afin de déterminer la valeur de la ou les propriété(s)

</details>

### Etape 4 - Classe Author :black_nib:

- se placer sur `master` et fusionner la branche `classe-category` dans master
- créer une branche `classe-author` et se placer dedans
- comme avec les articles et les catégories, on va créer une classe `Author`
- modifier le fichier `inc/data.php` pour que le tableau `$dataAuthorsList` soit un tableau d'objets `Author`
- en conséquence, modifier les templates

<details><summary>Indice(s)</summary>

- il faudra coder un ou des paramètre(s) optionnel(s) au constructeur afin de déterminer la valeur de la ou les propriété(s)

</details>

### Etape 5 - Article "Git, pour les n00bs" :baby:

- se placer sur `master` et fusionner la branche `classe-author` dans master
- créer une branche `un-article` et se placer dedans
- créer un fichier `article.php` à la racine
- dans une nouvelle variable `$article`
    - stocker l'objet de la classe `Article` correspondant à "Git, pour les n00bs"
    - attention, ne pas de copier coller du code :wink:
    - on va lire le tableau d'articles de `data.php`
    - pour ne récupérer que l'article voulu
- inclure les templates comme pour `index.php`
    - cependant la partie centrale sera différente
    - donc il faut un nouveau fichier de template
- visuellement, la page ressemble à la page d'accueil
    - n'afficher que le titre et le texte de l'article
    - ne pas afficher les boutons suivants/précédents
    - afficher après l'article un bouton pour revenir à l'accueil

<details><summary>Indices</summary>

- pour récupérer l'article voulu
    - analyser le tableau d'articles
    - retenir l'index/clé correspondant à l'article
    - accéder à la valeur correspondant à cet index afin de récupérer l'article
- parmi les 3 templates de l'index _header_, _home_ et _footer_
    - seuls _header & _footer_ sont utilisées pour toutes les pages
    - donc il faut créer un nouveau fichier de template _article_
    - et dans `article.php`, inclure ce template _article_ à la palce du template _home_

</details>

### Etape 6 - Page article dynamique :satellite:

- se placer sur `master` et fusionner la branche `un-article` dans master
- créer une branche `un-article-dynamique` et se placer dedans
- actuellement, `article.php` permet uniquement de visualiser 1 article
- on souhaite que ce fichier PHP permette de visualiser n'importe quel article
- modifier ce fichier pour afficher désormais l'article "Le syndrome de la page blanche"
- => tout se base uniquement sur l'index du tableau d'article
- rendre dynamique/configurable cet index :boom:
- mais comment faire cela ?
    - (même si tu as la réponse, ouvre la réponse pour avoir la suite de l'étape)

<details><summary>Réponse</summary>

- on pourrait créer un fichier php par article ?
    - mais ce ne serait pas dynamique puisqu'à chaque article ajouté, on devrait revenir sur le site coder le nouveau fichier
- transmettre l'information de l'article à afficher dans `article.php` ?
    - oui, mais quelle information transmettre ?
    - et comment ?

<details><summary>Quelle information ? => réponse</summary>

- on a besoin d'une information simple et unique
- on va donc prendre l'index de l'article dans le tableau d'articles
- on appelera cela son identifiant

</details>

<details><summary>Comment ? => réponse</summary>

- on dispose de l'id de l'article sur la page d'accueil
- on peut donc transmettre cet "id" dans le lien vers la page `article.php`
- on va utiliser les mêmes fonctionnalités que les formulaires
    - rappel : les formulaires permettent d'envoyer des données d'une page à une autre
    - ici, on va envoyer en "GET" la donnée "id"
    - => le lien sera `article.php?id=XXX`

</details>

<details><summary>Suite</summary>

- aller à l'URL `article.php?id=3`
- récupérer l'identifiant passé en paramètre d'URL
    - si tu ne sais pas comment le récupérer : `print_r($_GET);`
    - rappels :
        - les données envoyées en POST sont récupérées dans le tableau associatif `$_POST`
        - les données envoyées en GET sont récupérées dans le tableau associatif `$_GET`
    - ici, la donnée "id" est envoyée en GET
- au lieu de spécifier "en dur" l'index, l'id de l'article
    - utiliser l'id récupéré depuis l'URL
- normalement, en modifiant la valeur de l'id dans l'URL, la page doit afficher un autre article

</details>

</details>

### Etape 7 - Liens dynamiques vers les articles :loudspeaker:

- se placer sur `master` et fusionner la branche `un-article-dynamique` dans master
- créer une branche `liens-vers-article` et se placer dedans
- on va désormais pouvoir définir le lien pour chaque article affiché sur la page d'accueil
- dans la boucle sur les articles,
    - ajouter une balise `<a>` sur le titre de chaque article
    - il doit pointer sur le fichier `article.php` avec le paramètre vu à l'étape précédente
- vérifier que l'article affiché correspond bien à celui sur lequel on a cliqué
- :tada:

## Bonus

### Bonus 1 - Class App :bulb:

- se placer sur `master` et fusionner la branche `liens-vers-article` dans master
- créer une branche `classe-app` et se placer dedans
- créer une classe `App`
- cette classe va nous permettre de factoriser et centraliser la gestion et configuration de chaque page du site
- créer 1 propriété `title` privée
    - elle va contenir la valeur pour la balise `<title>`
- coder le constructeur de cette classe
    - permettre de fournir le titre en paramètre/argument de ce constructeur
- sur `index.php` et `article.php`,
    - créer une instance de la classe `App` dans une variable `$app`
    - passer en argument le titre de la page en question
        - par exemple "Accueil" sur la home et le titre de l'article dans la page article
- dans la template gérant la balise `<title>`, utiliser cet Objet `App` pour définir le titre de la page
    - quoi ?! la propriété est privée et tu as une erreur ? :astonished:
    - c'est normal, à toi de trouver la solution :smiling_imp:

### Bonus 2 - Inclusions des classes :rainbow:

- se placer sur `master` et fusionner la branche `classe-app` dans master
- créer une branche `includes` et se placer dedans
- l'inclusion des classes est dupliqué dans nos 2 fichiers `index.php` et `article.php`
- factoriser ces inclusions pour qu'elles se fassent au moment de l'inclusion de la classe `App`
- attention, lors d'inclusions de fichiers, le répertoire "courant" correspond toujours au fichier appelé par le navigateur
    - donc le dossier contenant `index.php` ou `article.php`

<details><summary>Indice</summary>

- il faudra au moins laisser une inclusion dans les fichiers `index.php` et `article.php` :wink:

</details>

### Bonus 3 - Factoriser catégories et auteurs :shower:

- se placer sur `master` et fusionner la branche `includes` dans master
- créer une branche `factoriser-c-est-la-vie` et se placer dedans
- la liste des catégories pour la nav et la sidebar est nécessaire sur toutes les pages du site
    - => donc il faudrait factoriser
- la liste des auteurs pour la sidebar est nécessaire sur toutes les pages du site
    - => donc il faudrait factoriser
- pour cela, on va créer 2 méthodes dans la classe `App`
    - `getCategories()` qui retourne le tableau des catégories
    - `getAuthors()` qui retourne le tableau des auteurs
- a toi de bien coder et utiliser ces 2 méthodes
    - pour info, les fichiers `index.php` et `article.php` ne doivent ni appeler ces méthodes, ni utiliser les variables `$dataCategoriesList` et `$dataAuthorsList`

<details><summary>Optimisation</summary>

- on peut donc charger le fichier `inc/data.php` dans chaque méthode
- mais on peut aussi :bulb:
    - ne le charger qu'une seule fois en tout
    - garder les résultats en "mémoire" dans l'objet de la classe `App`
    - puis retourner ces données "en mémoire" via les méthodes

</details>

### Bonus 4 - Articles dans App

- se placer sur `master` et fusionner la branche `factoriser-c-est-la-vie` dans master
- créer une branche `app-get-article-s` et se placer dedans
- comme dans le bonus précédent
- créer les méthodes suivantes dans la classe `App` :
    - `getArticles()` retournant le tableau de tous les articles
    - `getArticle($articleId)` retournant l'objet d'un article dont l'id est passé en paramètre
- cette fois-ci, ces méthodes seront à appeler dans `index.php` et/ou `article.hp`, puis stocker le résultat dans une variable
- désormais, il n'y a que la classe `App` qui utilise le fichier `inc/data.php`

### Bonus 5 - Articles d'une catégorie

- se placer sur `master` et fusionner la branche `app-get-article-s` dans master
- créer une branche `page-categorie` et se placer dedans
- on souhaite que l'URL `category.php?id=4` affiche tous les articles de la catégorie #4
    - c'est-à-dire les articles de la catégorie _Ma vie de dév_ (à ne pas confondre avec _Ma vie de Dave_, bien sûr)
    - c'est-à-dire les articles
        - _Ivre, il refait tous les challenges en un week-end sans dormir._
        - _Le syndrome de la page blanche_
- bien entendu, on pourra ensuite changer la valeur de l'id dans l'URL est accéder aux articles de la catégorie correspondante
- ensuite, modifier les liens de la navigation pour amener jusqu'à la page correspondante

### Bonus 6 - Articles d'un auteur

- se placer sur `master` et fusionner la branche `page-categorie` dans master
- créer une branche `page-auteur` et se placer dedans
- pareil mais pour l'URL `author.php?id=4` affiche tous les articles
- voilà :wink:

### Bonus 7 - Améliorations

- se placer sur `master` et fusionner la branche `page-auteur` dans master
- créer une branche `mes-ameliorations-a-moi` et se placer dedans
- il y a encore pleins de choses qui pourraient être améliorées
- on te laisse effectuer ces améliorations :wink:
