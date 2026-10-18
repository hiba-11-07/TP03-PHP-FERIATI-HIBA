
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partie 2 - Structures de contrôle et boucles</title>
</head>
<body>

<?php

echo "<h2>Exercice 2.1</h2>";

require "config.php";

function mention($note)
{
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}

$notes = [8, 10, 12, 14, 16, 18];

foreach ($notes as $note) {
    echo "Note : " . $note . " / Mention : "
        . mention($note) . "<br>";
}


echo "<h2>Exercice 2.2</h2>";

$mois = date("m");

switch ($mois) {
    case "01":
        $nom_mois = "Janvier";
        break;
    case "02":
        $nom_mois = "Février";
        break;
    case "03":
        $nom_mois = "Mars";
        break;
    case "04":
        $nom_mois = "Avril";
        break;
    case "05":
        $nom_mois = "Mai";
        break;
    case "06":
        $nom_mois = "Juin";
        break;
    case "07":
        $nom_mois = "Juillet";
        break;
    case "08":
        $nom_mois = "Août";
        break;
    case "09":
        $nom_mois = "Septembre";
        break;
    case "10":
        $nom_mois = "Octobre";
        break;
    case "11":
        $nom_mois = "Novembre";
        break;
    case "12":
        $nom_mois = "Décembre";
        break;
    default:
        $nom_mois = "Mois inconnu";
}

echo "Mois courant : " . $nom_mois . "<br>";

/*
Question : que se passe-t-il si on oublie break ?
Sans break, PHP continue à exécuter les instructions des cases
suivants, même si leur valeur ne correspond pas. Ce comportement
est appelé le "fall-through".
*/


echo "<h2>Exercice 2.3</h2>";

for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}

// Question 2 : while, nombres pairs de 0 à 20

echo "<h4>Question 2 - while</h4>";

$i = 0;

while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>" . $i . "</strong><br>";
    } else {
        echo $i . "<br>";
    }

    $i += 2;
}

// Question 3 : for et continue

echo "<h4>Question 3 - for et continue</h4>";

for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }

    echo $i . "<br>";
}

// Question 4 : while, switch et break 2

echo "<h4>Question 4 - break 2</h4>";

$i = 1;

while ($i <= 12) {
    switch ($i) {
        case 5:
            echo "At 5<br>";
            break;

        case 10:
            echo "At 10; quitting<br>";
            break 2;
    }

    $i++;
}

// Question 5 : do-while, nombres pairs de 0 à 20

echo "<h4>Question 5 - do-while</h4>";

$i = 0;

do {
    if ($i == 10) {
        echo "<strong>" . $i . "</strong><br>";
    } else {
        echo $i . "<br>";
    }

    $i += 2;
} while ($i <= 20);

/*
Différence essentielle :
while vérifie la condition avant d'exécuter le bloc.
do-while exécute le bloc une première fois, puis vérifie
la condition. Le bloc de do-while s'exécute donc au moins une fois.
*/

?>

</body>
</html>
