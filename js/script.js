/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

idKarty = null;
numer1 = null;
numer2 = null;
iloscKart = null;
pierwszeKlikniecie = true;
iloscRuchow = null;
aktualnaWersja = null;
wersja = 0;
var karty = new Array(33);
var request;

function graj() {

    if (pierwszeKlikniecie === true) {
        pierwszeKlikniecie = false;
        numer1 = idKarty;
    }
    else {

        numer2 = idKarty;
        pierwszeKlikniecie = true;

        if (numer1 !== numer2 && karty[numer1] === karty[numer2]) {
            iloscKart = iloscKart - 2;
            console.log("Znaleziono parę! Pozostalo: " + iloscKart);

            $("#" + numer1 + aktualnaWersja).off("click");
            $("#" + numer2 + aktualnaWersja).off("click");
            $("#karty").text("Pozostało: " + iloscKart);
        }
        else {
            $("#" + numer1 + aktualnaWersja).attr("src", "img/back.jpeg");
            $("#" + numer2 + aktualnaWersja).attr("src", "img/back.jpeg");
            
        }
        numer1 = null;
        numer2 = null;
        
        iloscRuchow = iloscRuchow + 1;
        $("#ruchy").text("Ruchy: " + iloscRuchow);
        
        
        if (iloscKart === 0)
        {
            window.alert("Gratulacje! wygrałeś!");
            wyslij();
        }
    }
}
function losuj(n) {

    flaga = false;
    k = n;
    licznik = 1;


    // wypełnianie tablicy liczbami 1,2...n
    var numbers = new Array(n);
    for (var i = 0; i < n; i++) {
        numbers[i] = i + 1;
    }

    // losowanie k liczb
    for (var i = 0; i < k; i++) {

        // tworzenie losowego indeksu pomiędzy 0 i n - 1
        var r = Math.floor(Math.random() * n);

        //wybieramy element z losowego miejsca       
        if (flaga === false) {
            karty[numbers[r]] = licznik;
            flaga = true;
        }
        else {
            karty[numbers[r]] = licznik;
            flaga = false;
            licznik++;
        }

        //przeniesienia ostatniego elementu do miejsca z którego wzięliśmy
        numbers[r] = numbers[n - 1];

        //zmniejszamy n
        n--;
    }
}
function reset(n) {

    idKarty = null;
    numer1 = null;
    numer2 = null;
    pierwszeKlikniecie = true;
    iloscKart = n;
    iloscRuchow = 0;
    losuj(n);

    $("#ruchy").text("Ruchy: " + iloscRuchow);
    $("#karty").text("Pozostało: " + iloscKart);

}
function wyslij() {

    /*WYSYŁANIE DANYCH DO BAZY*/
    /*Zdefiniowanie zdarzenia inicjującego 
     - kliknięcie przycisku wyślij*/

    /*Funkcja pobierająca wartość opcji z listy, w tym przypadku nazwa kraju, 
     która następnie zapisywana jest do zmiennej*/
    
    $.ajax({
        type: "POST", /*Informacja o tym, że dane będą wysyłane*/
        url: "wyslij.php", /*Informacja, o tym jaki plik będzie przy tym wykorzystywany*/
        data: {ruchy: iloscRuchow, wersja:wersja}, /*Zdefiniowanie jakie dane będą wysyłane na zasadzie 
         pary klucz-wartość np: wartosc_z_listy_ajax=Polska*/

        /*Działania wykonywane w przypadku sukcesu*/
        success: function () {

            /*Zdefiniowanie tzw. alertu (prostej informacji) w sytacji sukcesu wysyłania. 
             Za pomocą alertów możemy diagnozować poprawne działania funkcji. 
             Jest to bardzo przydatne w sytacji problemów z dziłaniem programu.*/
            //alert("Wysłano do bazy danych");

        },
        /*Działania wykonywane w przypadku błędu*/
        error: function (blad) {
            alert("Wystąpił błąd");
            console.log(blad); /*Funkcja wyświetlająca informacje 
             o ewentualnym błędzie w konsoli przeglądarki*/
        }
    });



}

$(document).ready(function () {
    //---------------pierwsze uruchomienie---------------//
    
    $('.maly').hide();
    $('.sredni').hide();
    $('.duzy').hide();
    $('#karty').hide();
    $('#ruchy').hide();

    //--------------------------------------------------//

    $('.karta').click(function () {

        idKarty = $(this).attr("id");

        setTimeout(function () {
            graj();
        }, 150);
        $(this).attr("src", "img/" + karty[idKarty] + ".jpeg");

    });

    $("#malyButton").click(function () {

        reset(16);
        aktualnaWersja = ".maly";
        wersja = 1;

        for (i = 1; i <= 16; i++)
        {
            $("#" + i + aktualnaWersja).attr("src", "img/back.jpeg");
            $("#" + i + aktualnaWersja).off("click");
            $("#" + i + aktualnaWersja).on("click", function () {

                idKarty = $(this).attr("id");

                setTimeout(function () {
                    graj();
                }, 150);
                $(this).attr("src", "img/" + karty[idKarty] + ".jpeg");

            });
        }

        $('.gra').fadeOut();
        setTimeout(function () {
            $('.maly').fadeIn();
            $("#karty").fadeIn();
            $("#ruchy").fadeIn()
        }, 500);


        $("#sredniButton").attr("class", "inactive");
        $("#duzyButton").attr("class", "inactive");
        $("#malyButton").attr("class", "active");

    });
    $("#sredniButton").click(function () {

        reset(24);
        aktualnaWersja = ".sredni";
        wersja = 2;

        for (i = 1; i <= 25; i++)
        {
            $("#" + i + aktualnaWersja).attr("src", "img/back.jpeg");
            $("#" + i + aktualnaWersja).off("click");
            $("#" + i + aktualnaWersja).on("click", function () {

                idKarty = $(this).attr("id");

                setTimeout(function () {
                    graj();
                }, 150);
                $(this).attr("src", "img/" + karty[idKarty] + ".jpeg");

            });
        }

        $('.gra').fadeOut();
        $('.gra').fadeOut();

        setTimeout(function () {
            $('.sredni').fadeIn();
            $("#karty").fadeIn();
            $("#ruchy").fadeIn()
        }, 500);

        $("#sredniButton").attr("class", "active");
        $("#duzyButton").attr("class", "inactive");
        $("#malyButton").attr("class", "inactive");
    });
    $("#duzyButton").click(function () {

        reset(36);
        aktualnaWersja = ".duzy";
        wersja = 3;

        for (i = 1; i <= 36; i++)
        {
            $("#" + i + aktualnaWersja).attr("src", "img/back.jpeg");
            $("#" + i + aktualnaWersja).off("click");
            $("#" + i + aktualnaWersja).on("click", function () {

                idKarty = $(this).attr("id");

                setTimeout(function () {
                    graj();
                }, 150);
                $(this).attr("src", "img/" + karty[idKarty] + ".jpeg");

            });
        }
        $('.gra').fadeOut();
        $('.gra').fadeOut();
        setTimeout(function () {
            $('.duzy').fadeIn();
            $("#karty").fadeIn();
            $("#ruchy").fadeIn()
        }, 500);


        $("#sredniButton").attr("class", "inactive");
        $("#duzyButton").attr("class", "active");
        $("#malyButton").attr("class", "inactive");

    });
});