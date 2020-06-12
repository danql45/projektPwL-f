<!DOCTYPE html>
<html lang="PL">
<head>
        <meta charset="UTF-8">
        <title>okazjaview.php</title>
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
                    <form class="d-none d-lg-block form-inline my-2 my-lg-0 justify-content-end flex-nowrap" method="GET" action="szukaj.php">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="szukaj">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
                    </form>
                    <div class="d-none d-md-block justify-content-end text- mr-3 ml-3">
                        <a id="one3" class="test-loginButton btn btn--mode-header-login btn--toW5-square" href="#">
                            <img src="images/pngwave.png" width="25" height="25" class="d-inline-block align-top" alt="">
                            <span class="space--l-2 hide--toW5">Zarejestruj się / Zaloguj Się</span></a>
                    </div>
                    <div class="d-flex justify-content-end" id="dodajbutt">
                        <a class="btn btn-danger" href="add.php">+Dodaj</a>
                      </div>
                </div>
            </nav>
        </header>

        
        <?php
            session_start();
            $numtemp = null;
            try{
                #$dBase = new PDO("mysql:host=localhost:3307;dbname=projektpwl", "root", "");
                $dBase = new PDO("mysql:host=localhost;dbname=danql45", "danN123", "!Dan2020");
            }catch(PDOException $e){
                echo "Połączenie z bazą danych zakończone niepowodzeniem: " . $e->getMessage();
            return;
            }

            if(isset($_GET['akcja'])){
                if($_GET['akcja'] == 'addlike'){
                    $sql = 'UPDATE okazja SET ile_like = ile_like + 1 WHERE id_okazja = ' . $_GET['id_okazja'];
                    $res = $dBase->exec($sql);
                }
            }
            
            if(isset($_POST['numokazja'])){
                $oka = $dBase->query('SELECT * from okazja where id_okazja=' . $_POST['numokazja']);
            }else if(isset($_GET['numokazja'])){
                $oka = $dBase->query('SELECT * from okazja where id_okazja= ' . $_GET['numokazja']);
            }else{
                $oka = $dBase->query('SELECT * from okazja where id_okazja= '. $_SESSION['numtemp']);
            }
            
            foreach($oka as $o){
                $numokazja = $o['id_okazja'];
                $sql = 'SELECT * FROM images WHERE id_image = ' . $o['id_image'];
                $link = $o['link_okazja'];
                $likes = $o['ile_like'];
                $cost = $o['cena_okazja'];
                $res = $dBase->query($sql);
                foreach($res as $r){
                    $img = $r['image_dir'];
                }        
                $sql = 'SELECT * FROM comment WHERE id_okazja = ' . $o['id_okazja'];
                $res = $dBase->query($sql);
        ?>
        <div class="container-1">
            <div class="box-1">
                <div class="titleokazja bg-dark"><a style="color: inherit;" href="<?=$link?>"><h3><?=$o['tytul_okazja']?></h3></a><h6><time datetime="1980-01-01 09:00"><?=$o['data_dodania']?></time>
                <div class="container bg-dark text-dark" style="padding: 0px;"> 
                    <a class="like" href="?akcja=addlike&id_okazja=<?=$o['id_okazja']?>"><i class="fa fa-thumbs-o-up"></i>  
                    Like <?=$likes?>
                    </a>
                </div>
                </h6>
            </div>
                <div class="imgitextokazja d-flex">
                    <div class="imgokazja"><img src="<?=$img?>" alt=""></div>
                    <div>
                        <div class="opisokazja text-truncate text-wrap" style="height: 504px; line-height: 1.2"><p><?=$o['opis_okazja']?></p></div>
                        <div class="d-flex justify-content-between">
                            <strong>Cena: <?=$cost?> zł</strong>
                            <strong><a style="color: inherit;" href="<?=$link?>">Link do okazji</a></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="komtext" style="background-color: unset;">
                    <strong>Komentarze</strong>
            </div>
        </div>

        <?php
        $numtemp = $numokazja;
        $_SESSION['numtemp'] = "$numokazja";
        foreach($res as $r){
        ?>
        <div class="container-1">
            <div class="box-1">
                <div class="bg-dark" style="color: rgb(255, 123, 0);">
                    <strong><?=$r['name']?></strong>
                </div>
                <div class="text-justify komfield">
                    <?=$r['comment']?>
                </div>
            </div>
            <div class="combuttdel" style="background-color: unset;">
                <a class="btn btn-warning" href="delcomment.php?id_comment=<?=$r['id_comment']?>&id_okazja=<?=$o['id_okazja']?> " role="button">Usuń</a>
            </div>
        </div>
        <?php
        }
        ?>

        <div class="container-1">
            <div class="box-1">
                <form action="addcomment.php" method="POST">
                    <input type="hidden" name="id_okazja" value="<?=$o['id_okazja']?>">
                    <input style="width: 100%, height: 10px" type="text" name="name" placeholder="Imię">
                    <textarea style="width: 100%; resize: none;" name="comment" cols="50" rows="4"  maxlength="1000" placeholder="Komentarz max 1000 znaków"></textarea>
                    <input class="btn btn-info" type="submit" value="Dodaj Komentarz">
                </form>
            </div>
        </div>
        <?php
        }
        ?>

        <div>
            <hr style="height: 10px; border: 0px; margin: 0; padding: 0; margin-left: 0;" class="bg-dark">
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
                <a href="index.php"> Chilli.pl</a>
            </div>
        </footer>

        </div>

        <div class="popup">
        <form method="POST" action="logcheckuser.php">
            <div class="popup-content">
                <img src="images/close.png" alt="Close" class="close">
                <img src="images/user.png" alt="User" width="70" height="70" id="user">
                <input type="text" placeholder="Login" name="login">
                <input type="text" placeholder="Hasło" name="password">
                <button class="button btn btn--mode-header-login btn--toW5-square logbutton" type="submit" style="background-color: white; margin: 20px;">Zaloguj się</button>
                <a href="newuser.html" class="button btn btn--mode-header-login btn--toW5-square logbutton" style="background-color: white; margin: 20px;">Utwórz nowe konto</a>
            </div>
        </form>
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