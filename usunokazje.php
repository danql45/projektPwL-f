<!DOCTYPE html>
<html lang="PL">
<head>
        <meta charset="UTF-8">
        <title>projektPwl</title>
        <link rel="stylesheet" href="css/projektstyle.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
                margin: 0;
                background-color: rgba(179, 179, 179, 0.479);
            }
        </style>
</head>
<body>
    <div class="container-fluid">
        <header class="bg-dark">
            <nav class="row navbar navbar-dark bg-dark d-flex flex-nowrap">
                <div class="col ml-auto" id="one1">
                    <a class="navbar-brand" href="index.php">
                        <img src="images/logochilli2.png" width="50" height="30" class="d-inline-block align-top" alt="">
                        Chilli
                    </a>
                </div>
                <div class="col-10 ml-auto mr-auto d-md-flex justify-content-end" id="one2">
                    <form class="d-none d-lg-block form-inline my-2 my-lg-0 justify-content-end flex-nowrap">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
                    </form>
                    <div class="d-none d-md-block justify-content-end text- mr-3 ml-3">
                        <a id="one3" class="test-loginButton btn btn--mode-header-login btn--toW5-square" href="#">
                            <img src="images/pngwave.png" width="25" height="25" class="d-inline-block align-top" alt="">
                            <span class="space--l-2 hide--toW5" href="index.php">Wyloguj</span></a>
                    </div>
                    <div class="d-flex justify-content-end" id="dodajbutt">
                        <a class="btn btn-danger" href="add.php">+Dodaj</a>
                      </div>
                </div>
            </nav>
        </header>
        <div class="row d-flex flex-nowrap bg-dark" id="subnav1">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="sub1" href="#">Najlepsze</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="sub2" href="#">Najnowsze</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="sub3" href="#">Komentowane</a>
                </li>
            </ul>
        </div>

        <?php
            try{
                #$dBase = new PDO("mysql:host=localhost:3307;dbname=projektpwl", "root", "");
                $dBase = new PDO("mysql:host=localhost;dbname=danql45", "danN123", "!Dan2020");
            }catch(PDOException $e){
                echo "Połączenie z bazą danych zakończone niepowodzeniem: " . $e->getMessage();
            return;
            }
            $oka = $dBase->exec('DELETE FROM okazja WHERE id_okazja = '. $_GET['id_okazja']);
            include 'editokazja.php';
        ?>
        <div id="conf_M">
            <div class="container d-flex justify-content-center">
                <h1>Usunięto.</h1>
            </div>
            <div class="container d-flex justify-content-center">
                <a class="btn btn-success" href="indexadmin.php">OK</a>
            </div>
        </div>

        <div>
            <hr style="height: 3px; border: 0px; margin: 0; padding: 0; margin-left: 0;" class="bg-dark">
        </div>
        
        <footer class="page-footer font-small mdb-color lighten-3 pt-4">
            <div class="container text-center text-md-left">
            <div class="row">
            <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1" id="footerinfo">
                <img src="images/logochilli2.png" width="50" height="30" class="d-inline-block align-top" alt="">
                <h5 class="mb-4">Największa społeczność łowców okazji w Polsce</h5>
                <p>Chilli.pl to społeczność dla osób poszukujących prawdziwych okazji. Znajdź, oceniaj i komentuj najlepsze okazje i kupony znalezione w internecie i poza nim.</p>
            </div>
            <hr class="clearfix w-100 d-md-none">
            <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">
                <h5 class="font-weight-bold text-uppercase mb-4">Firma</h5>
                <ul class="list-unstyled">
                    <li>
                        <p>
                            <a href="oNas.html">O Nas</a>
                        </p>
                    </li>
                    <li>
                        <p>
                            <a href="kontakt.html">Kontakt</a>
                        </p>
                    </li>
                </ul>
            </div>
            <hr class="clearfix w-100 d-md-none">
            <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">
                <h5 class="font-weight-bold text-uppercase mb-4" style="white-space: nowrap;">Informacje prawne</h5>
                    <ul class="list-unstyled">
                        <li>
                            <p>
                                <a href="regulamin.html">Regulamin</a>
                            </p>
                        </li>
                        <li>
                            <p>
                                <a href="cookie.html">Polityka plików cookie</a>
                            </p>
                        </li>
                    </ul>
            </div>
            <hr class="clearfix w-100 d-md-none">
            <div class="col-md-2 col-lg-2 text-center mx-auto my-4" style="white-space: nowrap;">
                <h5 class="font-weight-bold text-uppercase mb-4">Obserwuj nas</h5>
                    <a class="btn-floating btn-fb" href="https://www.facebook.com/pl.pepper">
                        <i class="fa fa-facebook-official" style="font-size:48px"></i>
                    </a><br>
                    <a class="btn-floating btn-tw" href="https://www.linkedin.com/company/pepper.com/">
                        <i class="fa fa-linkedin-square" style="font-size:48px" ></i>
                    </a>
            </div>
            </div>
            </div>
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
                <a href="indexadmin.php"> Chilli.pl</a>
            </div>
        </footer>

        </div>

        <div class="popup">
            <div class="popup-content">
                <img src="images/close.png" alt="Close" class="close">
                <img src="images/user.png" alt="User" width="70" height="70" id="user">
                <input type="text" placeholder="Login">
                <input type="text" placeholder="Hasło">
                <a href="#" id="logbutton" class="button btn btn--mode-header-login btn--toW5-square">Zaloguj się</a>
            </div>

        </div>
        <script>
            document.getElementById("one3").addEventListener("click", function(){
                document.querySelector(".popup").style.display = "flex";
            })

            document.querySelector(".close").addEventListener("click", function(){
                document.querySelector(".popup").style.display = "none";
            })
        </script>
</body>