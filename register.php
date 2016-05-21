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


    <title>Dobieranie w pary</title>
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
error_reporting(0);
include 'config.php';
db_connect();
 
// sprawdzamy czy user nie jest przypadkiem zalogowany
if(!$_SESSION['logged']) {
    // jeśli zostanie naciśnięty przycisk "Zarejestruj"
    if(isset($_POST['name'])) {
        // filtrujemy dane...
        $_POST['name'] = clear($_POST['name']);
        $_POST['password'] = clear($_POST['password']);
        $_POST['password2'] = clear($_POST['password2']);
        $_POST['email'] = clear($_POST['email']);
 
        // sprawdzamy czy wszystkie pola zostały wypełnione
        if(empty($_POST['name']) || empty($_POST['password']) || empty($_POST['password2']) || empty($_POST['email'])) {
            echo '<p class="text-center">Musisz wypełnić wszystkie pola.</p>';
        // sprawdzamy czy podane dwa hasła są takie same
        } elseif($_POST['password'] != $_POST['password2']) {
            echo '<p class="text-center">Podane hasła różnią się od siebie.</p>';
        // sprawdzamy poprawność emaila
        } elseif(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            echo '<p class="text-center">Podany email jest nieprawidłowy.</p>';
        } else {
            // sprawdzamy czy są jacyś uzytkownicy z takim loginem lub adresem email
            $result = mysql_query("SELECT Count(user_id) FROM `users` WHERE `user_name` = '{$_POST['name']}' OR `user_email` = '{$_POST['email']}'");
            $row = mysql_fetch_row($result);
            if($row[0] > 0) {
                echo '<p class="text-center">Już istnieje użytkownik z takim loginem lub adresem e-mail.</p>';
            } else {
                // jeśli nie istnieje to kodujemy haslo...
                $_POST['password'] = codepass($_POST['password']);
                // i wykonujemy zapytanie na dodanie usera
                mysql_query("INSERT INTO `users` (`user_name`, `user_password`, `user_email`, `user_regdate`) VALUES ('{$_POST['name']}', '{$_POST['password']}', '{$_POST['email']}', '".time()."')");
                echo '<p class="text-center">Zostałeś poprawnie zarejestrowany! Możesz się teraz <a href="login.php">zalogować</a>.</p>';
            }
        }
    }
 
    // wyświetlamy formularz
    echo '<form method="post" action="register.php" class="text-center">
        <p>
            Login:<br>
            <input type="text" value="'.$_POST['name'].'" name="name">
        </p>
        <p>
            Hasło:<br>
            <input type="password" value="'.$_POST['password'].'" name="password">
        </p>
        <p>
            Powtórz hasło:<br>
            <input type="password" value="'.$_POST['password2'].'" name="password2">
        </p>
        <p>
            E-mail:<br>
            <input type="text" value="'.$_POST['email'].'" name="email">
        </p>
        <p>
            <input type="submit" value="Zarejestruj">
        </p>
    </form>';
} else {
    echo '<p>Jesteś już zalogowany, więc nie możesz stworzyć nowego konta.</p>
        <p>[<a href="index.php">Powrót</a>]</p>';
}
 
db_close();
?>

</body></html>