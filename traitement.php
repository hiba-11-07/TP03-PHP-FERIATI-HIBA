<h2>Exercice 4.3</h2>

<?php

require "config.php";

// Vérifier que les champs existent
if (
    !isset($_POST["nom"], $_POST["note_info"], $_POST["note_math"])
) {
    exit("Erreur : tous les champs sont obligatoires.");
}

$nom_brut = trim($_POST["nom"]);
$info_brut = trim($_POST["note_info"]);
$math_brut = trim($_POST["note_math"]);

// Vérifier que les champs ne sont pas vides
// On teste les chaînes vides explicitement, car empty("0") vaut true.
if (
    $nom_brut === "" ||
    $info_brut === "" ||
    $math_brut === ""
) {
    exit("Erreur : veuillez remplir tous les champs.");
}

// Vérifier que les notes sont numériques
if (!is_numeric($info_brut) || !is_numeric($math_brut)) {
    exit("Erreur : les notes doivent être numériques.");
}

$note_info = (float) $info_brut;
$note_math = (float) $math_brut;

// Vérifier les limites autorisées
if (
    $note_info < NOTE_MIN || $note_info > NOTE_MAX ||
    $note_math < NOTE_MIN || $note_math > NOTE_MAX
) {
    exit(
        "Erreur : les notes doivent être comprises entre "
        . NOTE_MIN . " et " . NOTE_MAX . "."
    );
}

// Protéger le nom avant de l'afficher
$nom = htmlspecialchars($nom_brut, ENT_QUOTES, "UTF-8");

// Calculer la moyenne
$moyenne = ($note_info + $note_math) / 2;

echo "<h2>Exercice 5.1</h2>"

// Créer le dossier data s'il n'existe pas
if (!is_dir(__DIR__ . "/data")) {
    if (!mkdir(__DIR__ . "/data", 0775, true) &&
        !is_dir(__DIR__ . "/data")) {
        exit("Erreur : impossible de créer le dossier data.");
    }
}

$fichier = __DIR__ . "/data/notes.csv";

// Ouvrir en mode ajout
$fp = fopen($fichier, "a");

if ($fp === false) {
    exit("Erreur : impossible d'ouvrir le fichier CSV.");
}

// Écrire les données avec le séparateur ;
$enregistrement = [
    $nom_brut,
    $note_info,
    $note_math,
    $moyenne
];

if (fputcsv($fp, $enregistrement, ";") === false) {
    fclose($fp);
    exit("Erreur : impossible d'écrire dans le fichier CSV.");
}

// Fermer le fichier
fclose($fp);


// Afficher le récapitulatif
echo "<h3>Récapitulatif des notes</h3>";
echo "Nom : " . $nom . "<br>";
echo "Note en informatique : " . $note_info . "<br>";
echo "Note en mathématiques : " . $note_math . "<br>";
echo "Moyenne : " . round($moyenne, 2) . "<br>";

?>
