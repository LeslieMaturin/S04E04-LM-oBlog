<?php

// 1- Chargement des fichiers définissants les classes
require './inc/classes/Author.php';
require './inc/classes/Article.php';
require './inc/classes/Category.php';

// 2- Chargement des données
require './inc/data.php';

// 3- Inclusions des fichiers de template
require './inc/templates/header.tpl.php';
require './inc/templates/home.tpl.php';
require './inc/templates/footer.tpl.php';
