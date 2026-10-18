<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partie 3: Tableaux</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background-color: #eeeeee;
        }

        .echec {
            color: red;
        }
    </style>
</head>
<body>

<?php

require "config.php";

include "includes/entete_inc.php";
include "includes/menu_inc.php";

// Fonction de calcul de la mention
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

echo "<h2>Exercice 3.1</h2>";

$notes = [
    "Mohamed" => 16,
    "Ahmed" => 14,
    "Hind" => 13,
    "Aicha" => 15,
    "Samir" => 13,
    "Zakaria" => 13,
    "Rafik" => 10,
    "Ilham" => 9,
    "Hamza" => 7,
    "Sami" => 7,
    "Noura" => 14
];

$modules = ["PHP", "Algorithmique", "Bases de données"];

echo "<h4>Affichage des modules avec foreach</h4>";

foreach ($modules as $module) {
    echo $module . "<br>";
}

echo "<h4>Affichage des modules par indice</h4>";

echo $modules[0] . "<br>";
echo $modules[1] . "<br>";
echo $modules[2] . "<br>";


echo "<h2>Exercice 3.2</h2>";

echo "<table>";
echo "<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";

foreach ($notes as $nom => $note) {
    $classe = ($note < SEUIL) ? "echec" : "";

    echo "<tr class='" . $classe . "'>";
    echo "<td>" . htmlspecialchars($nom) . "</td>";
    echo "<td>" . $note . "</td>";
    echo "<td>" . mention($note) . "</td>";
    echo "</tr>";
}

echo "</table>";


echo "<h2>Exercice 3.3</h2>";

$somme = 0;
$meilleure = null;
$plus_faible = null;

foreach ($notes as $note) {
    $somme += $note;

    if ($meilleure === null || $note > $meilleure) {
        $meilleure = $note;
    }

    if ($plus_faible === null || $note < $plus_faible) {
        $plus_faible = $note;
    }
}

$nombre = count($notes);
$moyenne = $somme / $nombre;

echo "Somme calculée avec une boucle : " . $somme . "<br>";
echo "Nombre d'apprenants : " . $nombre . "<br>";
echo "Moyenne : " . round($moyenne, 2) . "<br>";
echo "Meilleure note : " . $meilleure . "<br>";
echo "Plus faible note : " . $plus_faible . "<br>";

// Vérification avec les fonctions PHP
echo "<h4>Vérification avec les fonctions PHP</h4>";

echo "Somme avec array_sum() : " . array_sum($notes) . "<br>";
echo "Nombre avec count() : " . count($notes) . "<br>";
echo "Maximum avec max() : " . max($notes) . "<br>";
echo "Minimum avec min() : " . min($notes) . "<br>";

// Effectifs par mention
$effectifs = [];

foreach ($notes as $nom => $note) {
    $m = mention($note);

    if (isset($effectifs[$m])) {
        $effectifs[$m]++;
    } else {
        $effectifs[$m] = 1;
    }
}

echo "<h4>Effectifs par mention</h4>";

foreach ($effectifs as $m => $effectif) {
    echo $m . " : " . $effectif . "<br>";
}


echo "<h2>Exercice 3.4</h2>";

// Fonction d'affichage réutilisable
function afficher($tab)
{
    echo "<table>";
    echo "<tr><th>Nom / Clé</th><th>Valeur</th></tr>";

    foreach ($tab as $cle => $valeur) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars((string) $cle) . "</td>";
        echo "<td>" . htmlspecialchars((string) $valeur) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}

$copie = $notes;
ksort($copie);
echo "<h4>1. Noms croissants (ksort)</h4>";
afficher($copie);

$copie = $notes;
arsort($copie);
echo "<h4>2. Notes décroissantes (arsort)</h4>";
afficher($copie);

$copie = $notes;
krsort($copie);
echo "<h4>3. Noms décroissants (krsort)</h4>";
afficher($copie);

$copie = $notes;
asort($copie);
echo "<h4>4. Notes croissantes (asort)</h4>";
afficher($copie);


echo "<h2>Exercice 3.5</h2>";

$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

echo "<h4>Résultat de \$a + \$b</h4>";
var_dump($a + $b);

echo "<h4>Résultat de \$a == \$b</h4>";
var_dump($a == $b);

echo "<h4>Résultat de \$a === \$b</h4>";
var_dump($a === $b);

echo "<br>";

?>
<br>
/* Experience 1:
include : si le fichier est absent, PHP émet un avertissement
et poursuit généralement l'exécution du script.
require : si le fichier est absent, PHP émet une erreur fatale
et interrompt l'exécution du script.
*/

<br>

/* Experience 2:
include inclut le fichier à chaque appel.
include_once inclut le fichier une seule fois au maximum
pendant l'exécution du script.
*/
<br>

<?php include "includes/pied_inc.php"; ?>
</body>

</html>
