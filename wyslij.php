<?php

/* Załączenie pliku odpowiadającego za połączenie z bazą danych. */
include 'config.php';
db_connect();
//include 'baza.php';

/* Definicja funkcji filtrującej wywoływana na zmiennej przed jej przesłaniem do bazy. 
  Utworzona ze względów bezpieczeństwa. */

function filtrowanie($zmienna) {
    $zmienna = substr($zmienna, 0, 9); // Ograniczenie ciągu do pierwszych 10 znaków
    $zmienna = trim($zmienna);
    $zmienna = stripslashes($zmienna);
    $zmienna = htmlspecialchars($zmienna);
    return $zmienna;
}

/* Przypisanie danych wysłanych przez skrypt.js do zmiennej */
$ruchy = $_POST['ruchy'];
$wersja = $_POST['wersja'];

$user_id =  $_SESSION['user_id'];

/* Przypisanie wyniku funkcji filtrowanie do zmiennej */
$ruchy_filtr = filtrowanie($ruchy);


if ($wersja == 1) {
    $zapytanie_wyslij = "UPDATE `users` SET `user_score_low` = $ruchy_filtr WHERE `user_id` = $user_id";
    $zapytanie_odbierz = mysql_query("SELECT `user_score_low` FROM `users` WHERE `user_id` = $user_id");
    
} elseif ($wersja == 2) {
    $zapytanie_wyslij = "UPDATE `users` SET `user_score_med` = $ruchy_filtr WHERE `user_id` = $user_id";
    $zapytanie_odbierz = mysql_query("SELECT `user_score_med` FROM `users` WHERE `user_id` = $user_id");

} else {
    $zapytanie_wyslij = "UPDATE `users` SET `user_score_high` = $ruchy_filtr WHERE `user_id` = $user_id";
    $zapytanie_odbierz = mysql_query("SELECT `user_score_high` FROM `users` WHERE `user_id` = $user_id");

}


$row = mysql_fetch_row($zapytanie_odbierz);
echo $row[0];

if ($row[0] > $ruchy || $row[0] == 0 ) {
    /* Wykonanie zapytania wysyłającego */
    $wynik_wyslij = mysql_query($zapytanie_wyslij);
}



db_close()
?>