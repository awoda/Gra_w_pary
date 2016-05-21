<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>


    <title>Profil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>
<body>     

    <nav class="navbar navbar-inverse ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Gra w pary</a>
            </div>
                    </div>
    </nav>

<?php
include 'config.php';
db_connect();
 
check_login();
 
// filtrujemy id oraz rzutujemy je na int
$_GET['id'] = (int)clear($_GET['id']);
 
// pobieramy dane usera z podanego id
$user_data = get_user_data($_GET['id']);
 
// sprawdzamy czy znalazło użytkownika
// jeśli nie to wyświetlamy komunikat
// a jeśli tak to wyświetlamy wszystkie jego dane
// jeśli user nie ma podanej strony www lub skąd jest to wyświetlamy "brak"
if($user_data === false) {
    echo '<p class="text-center" class="text-center">Niestety, taki użytkownik nie istnieje.</p>
        <p class="text-center">[<a href="index.php">Powrót</a>]</p>';
} else {
    echo '<h2 class="text-center">Profil użytkownika</h2>
        <p class="text-center">Nick: <b>'.$user_data['user_name'].'</b></p>
        <p class="text-center">Email: '.$user_data['user_email'].'</p>
        <p class="text-center">Data rejestracji: '.date("d.m.Y, H:i", $user_data['user_regdate']).'</p>
        <p class="text-center">Strona WWW: '.(empty($user_data['user_website']) ? 'brak' : $user_data['user_website']).'</p>
        <p class="text-center">Skąd: '.(empty($user_data['user_from']) ? 'brak' : $user_data['user_from']).'</p>';
}
 
db_close();

?>
</body>
</html>