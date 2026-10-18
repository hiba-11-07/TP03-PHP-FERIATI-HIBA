<?php 
echo 'Hello PHP';
//Commentaire 1
# Commentaire 2
/*Commentaire 3*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partie 1: Variables, constantes, types et chaines</title>
</head>
<body>

<h2>Exercice 1.1</h2>

<h4>Noms de variables valides</h4>

<?php
// $x : VALIDE, commence par une lettre.
$x = 10;

// $_x : VALIDE, commence par un underscore (_).
$_x = 20;

// $2x : INVALIDE, le nom commence par un chiffre après $.

// $x-y : INVALIDE, le tiret (-) n'est pas autorisé.

// $Prix_HT : VALIDE, contient des lettres et un underscore.
$Prix_HT = 50;

// $prix ht : INVALIDE, les espaces ne sont pas autorisés.

// $état : VALIDE, les noms de variables peuvent contenir des caractères Unicode.
$état = 70;

echo "Valeur de x : " . $x . "<br>";
echo "Valeur de _x : " . $_x . "<br>";
echo "Valeur de Prix_HT : " . $Prix_HT . "<br>";
echo "Valeur de état : " . $état . "<br>";

echo "<h4>Sensibilité à la casse</h4>";

$a = 100;
$A = 200;

echo "Valeur de a : " . $a . "<br>";
echo "Valeur de A : " . $A . "<br>";
?>


<h2>Exercice 1.2</h2>

<?php

// Inclusion obligatoire du fichier config.php
require "config.php";

// Affichage des constantes
echo "Établissement : " . ETABLISSEMENT . "<br>";
echo "Note minimale : " . NOTE_MIN . "<br>";
echo "Note maximale : " . NOTE_MAX . "<br>";
echo "Seuil de validation : " . SEUIL . "<br>";

// Vérification de l'existence des constantes
if (defined("SEUIL")) {
    echo "La constante SEUIL est définie.<br>";
}

if (defined("INCONNUE")) {
    echo "La constante INCONNUE est définie.<br>";
} else {
    echo "La constante INCONNUE n'est pas définie.<br>";
}

/*
Réponses aux questions :

1. Que se passe-t-il si on affiche une constante non définie ?
   PHP peut afficher un avertissement de type Warning et traiter
   le nom comme une chaîne de caractères dans certains contextes.
   Il est donc préférable de vérifier son existence avec defined().

2. Quelle différence y a-t-il entre const et define() ?
   - const permet de déclarer une constante directement dans le code.
     Sa valeur doit être une expression constante.
   - define() est une fonction qui définit une constante à l'exécution.
     Elle permet notamment de définir une constante dans un bloc
     conditionnel. Les deux méthodes créent des constantes
     qui ne peuvent pas être réaffectées.
*/

?>


<h2>Exercice 1.3</h2>

<?php

$prix_ht = 60;
$tva = 20;

// Calcul de la TVA
$montant_tva = $prix_ht * $tva / 100;

// Calcul du prix TTC
$prix_ttc = $prix_ht + $montant_tva;

// Affichage : toutes les valeurs viennent des variables
echo "Le prix TTC du produit est de " . $prix_ttc . " €.";

?>


<h2>Exercice 1.4</h2>

<?php

// 1. Conversion de 42 en chaîne de caractères
$test = 42;
$test = (string) $test;

echo "1. Conversion de \$test en string : ";
var_dump($test);

echo "<hr>";

// 2. Conversion des valeurs en booléen
echo "2. Conversions en booléen :<br>";

var_dump((bool) 0);
echo "<br>";

var_dump((bool) 0.0);
echo "<br>";

var_dump((bool) "0");
echo "<br>";

var_dump((bool) "");
echo "<br>";

var_dump((bool) "abc");
echo "<br>";

var_dump((bool) []);
echo "<br>";

var_dump((bool) null);
echo "<hr>";

// 3. Prédiction et vérification des conversions
echo "3. Conversions numériques :<br>";

var_dump((int) 3.9);
echo "<br>";

var_dump((int) "12abc");
echo "<br>";

var_dump((float) "1.5e3");
echo "<br>";

var_dump((int) true);
echo "<hr>";

// 4. Le nombre 255 dans quatre bases
echo "4. Représentation du nombre 255 :<br>";

$decimal = 255;
$hexadecimal = 0xFF;
$octal = 0377;
$binaire = 0b11111111;

echo "Décimale : " . $decimal . "<br>";
echo "Hexadécimale : " . $hexadecimal . "<br>";
echo "Octale : " . $octal . "<br>";
echo "Binaire : " . $binaire . "<br>";

?>


<h2>Exercice 1.5</h2>

<?php

$traitees = "égales à";
$ici = 2;

// 1. Afficher des guillemets doubles et une apostrophe
echo "Ahmed a dit : \"J'ai réussi\"";
echo "<br>";

// 2. Afficher le chemin avec les antislashs
echo 'Voulez-vous supprimer C:\*.*?';
echo "<br>";

// 3. Afficher \n tel quel, sans nouvelle ligne
echo 'Ceci n\'affichera pas \n de nouvelle ligne';
echo "<br>";

// 4. Les variables ne doivent pas être interprétées
echo 'Les variables ne seront pas $traitees $ici';
echo "<br>";

// 5. Les variables doivent être interprétées
echo "Les variables seront $traitees $ici";
echo "<br><br>";

// Retirer les * au début et à la fin
$chaine = "*Bonjour les développeurs*";
$chaine = trim($chaine, "*");

echo $chaine;
echo "<br><br>";

// Afficher chaque lettre sur une ligne différente
$texte = "Bonjour";

for ($i = 0; $i < strlen($texte); $i++) {
    echo $texte[$i] . "<br>";
}

?>

</body>
</html>
