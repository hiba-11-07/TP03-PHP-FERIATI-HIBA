# tp-php
TP03-PHP-FERIATI-HIBA
Nom: Feriati
Prenom: Hiba
Groupe: 1


Notes des exercices:

Exercice 4.3:
Question 1 — Pourquoi préférer POST à GET pour un mot de passe ?
Avec GET, les données apparaissent dans l'URL. Un mot de passe pourrait donc être exposé dans l'historique du navigateur, les journaux du serveur ou une URL partagée.
Avec POST, les données sont envoyées dans le corps de la requête HTTP et ne figurent normalement pas dans l'URL.
Attention : POST ne chiffre pas les données à lui seul. Il faut utiliser HTTPS pour protéger les données pendant leur transmission.
Question 2 — Que contient $_REQUEST ?
$_REQUEST est un tableau PHP qui peut contenir les données issues de :
$_GET : paramètres transmis dans l'URL ;
$_POST : données envoyées dans le corps d'une requête POST ;
$_COOKIE : cookies transmis par le navigateur.
Son contenu exact dépend de la configuration PHP, notamment de request_order et variables_order.

Exercice 6.2:
1.Où est stockée une session ? Où est stocké un cookie ?
Une session PHP est généralement stockée côté serveur. Le navigateur conserve habituellement un identifiant de session dans un cookie pour permettre au serveur de retrouver les données correspondantes.
Un cookie est stocké côté navigateur, puis renvoyé au serveur dans les requêtes concernées.
2.Pourquoi setcookie() et header() doivent-ils être appelés avant tout affichage ?
Ces fonctions envoient des en-têtes HTTP. Une fois que PHP a commencé à envoyer le contenu de la page au navigateur, il peut être trop tard pour modifier ces en-têtes. Cela peut provoquer l'erreur headers already sent.
C'est pourquoi session_start(), setcookie() et header() doivent être exécutés avant tout affichage HTML ou echo.