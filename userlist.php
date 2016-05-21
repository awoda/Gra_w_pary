<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>


        <title>HALL OF FAME</title>
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

            .center-table
            {
                margin: 0 auto !important;
                float: none !important;
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
        <div class="text-center">
            <?php
            include 'config.php';
            db_connect();

            check_login();

// wyświetlamy początek prostej tabelki
            echo '<h2>Hall of FAME</h2>
            <h3>Poziom łajzowaty</h3>
            <table border="1" width="500px" class="center-table">
            <tr>
                <th>Nick</th>
                <th>Email</th>
                <th>Ruchy</th>
            </tr>';

// sprawdzamy ilu jest wszystkich userów
            $result = mysql_query("SELECT Count(user_id) FROM `users` WHERE `user_score_low` > 0");
//echo $result;
            $row = mysql_fetch_row($result);
//echo $row[0];
            $count_users = $row[0];

// ustawiamy ile ma być wyników na 1 strone
            $per_page = 10;

// jeśli jest chociaż 1 user to wyświetlamy
            if ($count_users > 0) {
                $result = mysql_query("SELECT * FROM `users` ORDER BY `user_score_low` LIMIT " . $per_page);
                while ($row = mysql_fetch_assoc($result)) {
                    if ($row['user_score_low'] != 0) {
                        echo '<tr>
                        <td><a href="profile.php?id=' . $row['user_id'] . '">' . $row['user_name'] . '</a></td>
                        <td>' . $row['user_email'] . '</td>
                        <td>' . $row['user_score_low'] . '</td>
                        </tr>';
                    }
                }
            } else {
                // jeśli nie ma w ogóle to wyświetlamy komunikat
                echo '<tr>
                <td colspan="3" style="text-align:center">Niestety nie znaleziono żadnych użytkowników.</td>
                </tr>';
            }
            echo '</table>';


//---- Wersja Mid----

            echo '
        <h3>Poziom taki-se</h3>    
        <table border="1" width="500px" class="center-table">
        <tr>
        <th>Nick</th>
        <th>Email</th>
        <th>Ruchy</th>
        </tr>';

// sprawdzamy ilu jest wszystkich userów
            $resultM = mysql_query("SELECT Count(user_id) FROM `users` WHERE `user_score_med` > 0");
            $rowM = mysql_fetch_row($resultM);
            $count_usersM = $rowM[0];

// ustawiamy ile ma być wyników na 1 strone
            $per_pageM = 10;

// jeśli jest chociaż 1 user to wyświetlamy
            if ($count_usersM > 0) {
                $resultM = mysql_query("SELECT * FROM `users` ORDER BY `user_score_med` LIMIT " . $per_pageM);
                while ($rowM = mysql_fetch_assoc($resultM)) {
                    if ($rowM['user_score_med'] != 0) {
                        echo '<tr>
                        <td><a href="profile.php?id=' . $rowM['user_id'] . '">' . $rowM['user_name'] . '</a></td>
                        <td>' . $rowM['user_email'] . '</td>
                        <td>' . $rowM['user_score_med'] . '</td>
                        </tr>';
                    }
                }
            } else {
                // jeśli nie ma w ogóle to wyświetlamy komunikat
                echo '<tr>
                <td colspan="3" style="text-align:center">Niestety nie znaleziono żadnych użytkowników.</td>
                </tr>';
            }
            echo '</table>';


//---- Wersja HI-----

            echo '
            <h3>Poziom miszcz</h3>    
            <table border="1" width="500px" class="center-table">
            <tr>
                <th>Nick</th>
                <th>Email</th>
                <th>Ruchy</th>
            </tr>';

// sprawdzamy ilu jest wszystkich userów
            $resultH = mysql_query("SELECT Count(user_id) FROM `users` WHERE `user_score_high` > 0");
            $rowH = mysql_fetch_row($resultH);
            $count_usersH = $rowH[0];

// ustawiamy ile ma być wyników na 1 strone
            $per_pageH = 10;

// jeśli jest chociaż 1 user to wyświetlamy
            if ($count_usersH > 0) {
                $resultH = mysql_query("SELECT * FROM `users` ORDER BY `user_score_high` LIMIT " . $per_pageH);
                while ($rowH = mysql_fetch_assoc($resultH)) {
                    if ($rowH['user_score_high'] != 0) {
                        echo '<tr>
                        <td><a href="profile.php?id=' . $rowH['user_id'] . '">' . $rowH['user_name'] . '</a></td>
                        <td>' . $rowH['user_email'] . '</td>
                        <td>' . $rowH['user_score_high'] . '</td>
                        </tr>';
                    }
                }
            } else {
                // jeśli nie ma w ogóle to wyświetlamy komunikat
                echo '<tr>
                <td colspan="3" style="text-align:center">Niestety nie znaleziono żadnych użytkowników.</td>
                </tr>';
            }
            echo '</table>';


            db_close();
            ?>
        </div>

    </body>
</html>