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

        <p><h4 class="text-center">Zostałeś poprawnie zalogowany! Zostaniesz przeniesiony na stronę główną w ciagu 3 sekund.</h4></p>
    <p class="text-center">Jeśli przeglądarka nie przeniesie Cię sama, kliknij <b><a href="index.php">TUTAJ</a></b></p>

    <?php
    header("refresh:3;url=index.php");
    ?>
</body>
</html>
