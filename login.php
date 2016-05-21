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
    if (!$_SESSION['logged']) {
        // jeśli zostanie naciśnięty przycisk "Zaloguj"
        if (isset($_POST['name'])) {
            // filtrujemy dane...
            $_POST['name'] = clear($_POST['name']);
            $_POST['password'] = clear($_POST['password']);
            // i kodujemy hasło
            $_POST['password'] = codepass($_POST['password']);

            // sprawdzamy prostym zapytaniem sql czy podane dane są prawidłowe
            $result = mysql_query("SELECT `user_id` FROM `users` WHERE `user_name` = '{$_POST['name']}' AND `user_password` = '{$_POST['password']}' LIMIT 1");
            if (mysql_num_rows($result) > 0) {
                // jeśli tak to ustawiamy sesje "logged" na true oraz do sesji "user_id" wstawiamy id usera
                $row = mysql_fetch_assoc($result);
                $_SESSION['logged'] = true;
                $_SESSION['user_id'] = $row['user_id'];
                header('Location: redirecting.php');
            } else {
                echo '<p class="text-center">Podany login i/lub hasło jest nieprawidłowe.</p>';
            }
        }

        // wyświetlamy komunikat na zalogowanie się
        echo '<form method="post" action="login.php" class="text-center">
        <p>
            Login:<br>
            <input type="text" value="' . $_POST['name'] . '" name="name">
        </p>
        <p>
            Hasło:<br>
            <input type="password" value="' . $_POST['password'] . '" name="password">
        </p>
        <p>
            <input type="submit" value="Zaloguj">
        </p>
    </form>';
    } else {
        echo '<p class="text-center">Jesteś już zalogowany, więc nie możesz się zalogować ponownie.</p>
        <p class="text-center">[<a href="index.php">Powrót</a>]</p>';
    }

    db_close();
    ?>
</body>
</html>
