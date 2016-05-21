<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>


        <title>Edycja profilu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
    <body>     

        <!-- MÓJ DODATKOWY STYL -->
        <style type="text/css">  
            .nopadding {
                padding: 0 !important;
                margin: 0 !important;
            } 
        </style>

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

        $user_data = get_user_data();

// jeśli zostanie naciśnięty przycisk "Edytuj profil"
        if (isset($_POST['email'])) {
            // filtrujemy dane
            $_POST['website'] = clear($_POST['website']);
            $_POST['from'] = clear($_POST['from']);
            $_POST['new_password'] = clear($_POST['new_password']);
            $_POST['new_password2'] = clear($_POST['new_password2']);
            $_POST['password'] = clear($_POST['password']);
            $_POST['email'] = clear($_POST['email']);

            // zmienne tymczasowe na treść błędu
            $err = '';
            // i zapytanie sql
            $up2 = '';

            // jeśli zostanie podane nowe hasło lub inny email
            if (!empty($_POST['new_password']) || $_POST['email'] != $user_data['user_email']) {
                // sprawdzamy czy zostało podane aktualne hasło
                if (empty($_POST['password'])) {
                    $err = '<p class="text-center">Jeśli chcesz zmienić hasło lub adres email musisz podać aktualne hasło.</p>';
                    // jeśli zostało podane to sprawdzamy czy jest poprawne
                } elseif (codepass($_POST['password']) != $user_data['user_password']) {
                    $err = '<p class="text-center">Podane aktualne hasło jest nieprawidłowe.</p>';
                } else {
                    // jeśli wszystko jest ok...
                    // sprawdzamy czy user chce zmienić hasło
                    if (!empty($_POST['new_password'])) {
                        // jeśli podane dwa hasła są różne to wyświetlamy błąd
                        if ($_POST['new_password'] != $_POST['new_password2']) {
                            $err = '<p class="text-center">Podane hasła nie są takie same.</p>';
                            // jeśli wszystko jest ok, dopisujemy do zmiennej tymczasowej zapytanie do zaktualizowania hasła
                        } else {
                            $up2.= ", `user_password` = '" . codepass($_POST['new_password']) . "'";
                        }
                    }
                    // sprawdzamy czy user chce zmienić email (czy ten podany jest różny od aktualnego)
                    if ($_POST['email'] != $user_data['user_email']) {
                        // sprawdzamy czy podany email jest prawidłowy
                        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
                            $err = '<p class="text-center">Podany email jest nieprawidłowy.</p>';
                        } else {
                            // sprawdzamy czy istnieje taki email w bazie przy czym omijamy usera który jest zalogowany
                            $result = mysql_query("SELECT Count(user_id) FROM `users` WHERE `user_id` != '{$user_data['user_id']}' AND `user_email` = '{$_POST['email']}'");
                            $row = mysql_fetch_row($result);
                            if ($row[0] > 0) {
                                $err = '<p class="text-center">Już istnieje użytkownik z takim loginem lub adresem e-mail.</p>';
                            } else {
                                // jeśli wszystko jest ok to dopisujemy zapytanie do zaktualizowania emaila
                                $up2.= ", `user_email` = '{$_POST['email']}'";
                            }
                        }
                    }
                }
            }

            // jeśli są jakieś błędy z powyższych działań to je wyświetlamy
            if (!empty($err)) {
                echo $err;
            } else {
                // jeśli nie ma błędów to wykonujemy zapytanie dopisując te na aktualizacje hasła oraz emaila - $up2
                $result = mysql_query("UPDATE `users` SET `user_website` = '{$_POST['website']}', `user_from` = '{$_POST['from']}'{$up2} WHERE `user_id` = '{$user_data['user_id']}'");
                if ($result) {
                    // jeśli zapytanie się wykonało to wyświetlamy komunikat...
                    echo '<p class="text-center">Twój profil został poprawnie zaktualizowany.</p>';
                    // i pobieramy od nowa dane usera aby w poniższym formularze się one zaktualizowały
                    $user_data = get_user_data();
                } else {
                    // jeśli zapytanie będzie błędne to wyświetlamy treść errora
                    echo '<p class="text-center">Niestety wystąpił błąd:<br>' . mysql_error() . '</p>';
                }
            }
        }

// wyświetlamy prosty formularz
        echo '<form method="post" action="editprofile.php" class="text-center">
    <p>
        Login:<br>
        <input type="text" value="' . $user_data['user_name'] . '" disabled="true">
    </p>
    <p>
        Strona WWW:<br>
        <input type="text" value="' . $user_data['user_website'] . '" name="website">
    </p>
    <p>
        Skąd:<br>
        <input type="text" value="' . $user_data['user_from'] . '" name="from">
    </p>
    <p>
        Nowe hasło (pozostaw puste jeśli nie chcesz zmieniać):<br>
        <input type="password" value="" name="new_password" autocomplete="off">
    </p>
    <p>
        Powtórz nowe hasło:<br>
        <input type="password" value="" name="new_password2" autocomplete="off">
    </p>
    <p>
        E-mail:<br>
        <input type="text" value="' . $user_data['user_email'] . '" name="email">
    </p>
    <p>
        Aktualne hasło (wymagane przy zmianie emaila lub hasła):<br>
        <input type="password" value="" name="password" autocomplete="off">
    </p>
    <p>
        <input type="submit" value="Edytuj profil">
    </p>
</form>';

        db_close();
        ?>

    </body>
</html>
