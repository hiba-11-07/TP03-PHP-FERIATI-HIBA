<h2>Exercice 6.3</h2>

<?php

date_default_timezone_set("Africa/Casablanca");

// Date de fin de semestre choisie : 15 janvier 2027
$aujourdHui = new DateTime("today");
$finSemestre = new DateTime("2027-01-15");

// Calcul de la différence entre les deux dates
$difference = $aujourdHui->diff($finSemestre);

echo "Aujourd'hui : " . $aujourdHui->format("d/m/Y") . "<br>";
echo "Fin du semestre : " . $finSemestre->format("d/m/Y") . "<br>";

if ($aujourdHui < $finSemestre) {
    echo "Nombre de jours restants : " . $difference->days;
} elseif ($aujourdHui == $finSemestre) {
    echo "C'est le dernier jour du semestre choisi.";
} else {
    echo "La date de fin du semestre est déjà passée.";
}

?>

<h2>Vérification d'une date</h2>

<form action="dates.php" method="POST">
    <label for="jour">Jour :</label>
    <input type="number" id="jour" name="jour"
           min="1" max="31" required>
    <br><br>

    <label for="mois">Mois :</label>
    <input type="number" id="mois" name="mois"
           min="1" max="12" required>
    <br><br>

    <label for="annee">Année :</label>
    <input type="number" id="annee" name="annee"
           min="1" max="32767" required>
    <br><br>

    <button type="submit">Vérifier</button>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $jour = filter_input(INPUT_POST, "jour", FILTER_VALIDATE_INT);
    $mois = filter_input(INPUT_POST, "mois", FILTER_VALIDATE_INT);
    $annee = filter_input(INPUT_POST, "annee", FILTER_VALIDATE_INT);

    if (
        $jour === false || $jour === null ||
        $mois === false || $mois === null ||
        $annee === false || $annee === null
    ) {
        echo "<p>Veuillez saisir des nombres entiers valides.</p>";
    } elseif (checkdate($mois, $jour, $annee)) {
        echo "<p>La date " . $jour . "/" . $mois . "/" . $annee
            . " est valide.</p>";
    } else {
        echo "<p>Cette date n'existe pas.</p>";
    }
}

?>
