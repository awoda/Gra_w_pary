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
        <!-- MÓJ DODATKOWY STYL -->
        <style type="text/css">  
            .nopadding {
                padding: 0 !important;
                margin: 0 !important;
            } 
        </style>
        <!-- Glowne okno programu -->
        <?php
        include 'config.php';
        db_connect();

        check_login();

        // pobieramy dane usera
        $user_data = get_user_data();

        echo'<nav class="navbar navbar-inverse">
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
                <div id="navbar" class="collapse navbar-collapse">
                <p class="navbar-text"><b>Nowa gra:</b></p>
                    <ul class="nav navbar-nav">
                        <li id="malyButton"><a href="#">Mała</a></li>
                        <li id="sredniButton"><a href="#">Średnia</a></li>
                        <li id="duzyButton"><a href="#">Duża</a></li>
                    </ul>    
                    <p id="karty" class="navbar-text navbar-right">Punkty: </p>
                    <p id="ruchy" class="navbar-text navbar-right">Ruchy: </p>       
                </div>
            </div>
        </nav>
        <p class="text-center">[<a href="profile.php?id=' . $user_data['user_id'] . '">Wyświetl swój profil</a>] [<a href="editprofile.php">Edytuj profil</a>] [<a href="userlist.php">HALL of FAME</a>] [<a href="logout.php"><b>Wyloguj się</b></a>]</p>
        <p class="text-center">Witaj <b>' . $user_data['user_name'] . '</b>!</p>';
        db_close();
        ?>
        <!--WERSJA MALA-->
        <div class="container theme-showcase col-lg-4 col-md-3 col-sm-3 col-xs-6 maly gra"></div>
        <div class="container col-lg-4 col-md-6 col-sm-6 col-xs-12 maly gra">

            <div class="row ">
                <div class="col-md-3 col-sm-3 col-xs-3  nopadding ">
                    <img id="1" class="img-responsive img-thumbnail karta maly" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3  nopadding ">
                    <img id="2" class="img-responsive img-thumbnail karta maly" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3  nopadding ">
                    <img id="3" class="img-responsive img-thumbnail karta maly" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3  nopadding ">
                    <img id="4" class="img-responsive img-thumbnail karta maly" alt="" src="img/back.jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3  nopadding  ">
                    <img id="5" class="img-responsive img-thumbnail karta maly" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3  nopadding  ">
                    <img id="6" class="img-responsive img-thumbnail karta maly" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3  nopadding  ">
                    <img id="7" class="img-responsive img-thumbnail karta maly" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3  nopadding  ">
                    <img id="8" class="img-responsive img-thumbnail karta maly" alt="" src="img/back.jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3  nopadding  ">
                    <img id="9" class="img-responsive img-thumbnail karta maly" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3  nopadding  ">
                    <img id="10" class="img-responsive img-thumbnail karta maly" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3  nopadding  ">
                    <img id="11" class="img-responsive img-thumbnail karta maly" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3  nopadding  ">
                    <img id="12" class="img-responsive img-thumbnail karta maly" alt="" src="img/back.jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3  nopadding  ">
                    <img id="13" class="img-responsive img-thumbnail karta maly" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3  nopadding  ">
                    <img id="14" class="img-responsive img-thumbnail karta maly" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3  nopadding  ">
                    <img id="15" class="img-responsive img-thumbnail karta maly" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3  nopadding  ">
                    <img id="16" class="img-responsive img-thumbnail karta maly" alt="" src="img/back.jpeg" />
                </div>
            </div>
        </div>
        <div class="container col-lg-4 col-md-3 col-sm-3 col-xs-6 maly gra"></div>



        <!--WERSJA SREDNIA-->

        <div class="container theme-showcase col-lg-4 col-md-3 col-sm-3 col-xs-6 sredni gra"></div>
        <div class="container col-lg-4 col-md-6 col-sm-6 col-xs-12 sredni gra">

            <div class="row ">
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding ">
                    <img id="1" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding ">
                    <img id="2" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding ">
                    <img id="3" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding ">
                    <img id="4" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding ">
                    <img id="5" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="21" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="6" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="7" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="8" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="9" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding ">
                    <img id="10" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="22" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="11" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="12" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="13" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="14" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding ">
                    <img id="15" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="23" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="16" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="17" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="18" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="19" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding ">
                    <img id="20" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="24" class="img-responsive img-thumbnail karta sredni" alt="" src="img/back.jpeg" />
                </div>
            </div>
           
        </div>
        <div class="container col-lg-4 col-md-3 col-sm-3 col-xs-6 sredni gra"></div>


        <!--WERSJA DUZA-->

        <div class="container theme-showcase col-lg-4 col-md-3 col-sm-3 col-xs-6 duzy gra"></div>
        <div class="container col-lg-4 col-md-6 col-sm-6 col-xs-12 duzy gra">

            <div class="row ">
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding ">
                    <img id="1" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding ">
                    <img id="2" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding ">
                    <img id="3" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding ">
                    <img id="4" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="5" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="6" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="7" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="8" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="9" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="10" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="11" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="12" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="13" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="14" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="15" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="16" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="17" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="18" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="19" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="20" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="21" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="22" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="23" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="24" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="25" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="26" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="27" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="28" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="29" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="30" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="31" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="32" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="33" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="34" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="35" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2  nopadding  ">
                    <img id="36" class="img-responsive img-thumbnail karta duzy" alt="" src="img/back.jpeg" />
                </div>
            </div>
        </div>
        <div class="container col-lg-4 col-md-3 col-sm-3 col-xs-6 duzy gra"></div>



        <!-- wczytanie kart do pamieci-->
        <div class="container preload" style="display:none">
            <img src="img/back.jpeg" alt="" />
            <img src="img/1.jpeg" alt="" />
            <img src="img/2.jpeg" alt="" />
            <img src="img/3.jpeg" alt="" />
            <img src="img/4.jpeg" alt="" />
            <img src="img/5.jpeg" alt="" />
            <img src="img/6.jpeg" alt="" />
            <img src="img/7.jpeg" alt="" />
            <img src="img/8.jpeg" alt="" />
            <img src="img/9.jpeg" alt="" />
            <img src="img/10.jpeg" alt="" />
            <img src="img/11.jpeg" alt="" />
            <img src="img/12.jpeg" alt="" />
            <img src="img/13.jpeg" alt="" />
            <img src="img/14.jpeg" alt="" />
            <img src="img/15.jpeg" alt="" />
            <img src="img/16.jpeg" alt="" />
            <img src="img/17.jpeg" alt="" />
            <img src="img/18.jpeg" alt="" />
        </div>

    </body>
</html>


