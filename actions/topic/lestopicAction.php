<?php

require('actions/database.php');

$getAllMyTopic = $bdd->prepare('SELECT id, titre, tag, description FROM topic WHERE id_auteur = ? ORDER BY id DESC');
$getAllMyTopic->execute(array($_SESSION['id']));



