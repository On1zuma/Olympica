<?php

require('actions/database.php');

//ca veut dire qu'on demande à recup les données d'une reponse qui se trouve dans la table answers
$getAllAnswersOfThisTopic = $bdd->prepare('SELECT id ,id_auteur, pseudo_auteur, id_question, contenu, date_message FROM answers WHERE id_question = ? ORDER BY id DESC');//ordre de l'id le plus anciens à la fin et le plus récent au debut
$getAllAnswersOfThisTopic->execute(array($idoftopic));
