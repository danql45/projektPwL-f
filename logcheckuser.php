<!DOCTYPE html>
<html lang="PL">
    <head>
        <meta charset="UTF-8">
        <title>logcheckuser.php</title>
        <link rel="stylesheet" type="text/css" href="css/projektstyle.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php
            session_start();

            try{
                #$dBase = new PDO("mysql:host=localhost:3307;dbname=projektpwl", "root", "");
                $dBase = new PDO("mysql:host=localhost;dbname=danql45", "danN123", "!Dan2020");
            }catch(PDOException $e){
                echo "Połączenie z bazą danych zakończone niepowodzeniem: " . $e->getMessage();
            return;
            }

            
            if (!empty($_POST)) {
                $name = $_REQUEST['login']; 
                $pas = $_REQUEST['password'];
            }
            $user = $dBase->query('SELECT loginn, pass_SHA512, typ_uzytkownik from uzytkownik');
            foreach($user as $u){
                if($name == $u['loginn'] && $pas == $u['pass_SHA512']){
                    echo "successful";
                    $_SESSION["zalogowany"] = true;
                    if($u['typ_uzytkownik'] == 1){
                        $check = 0;
                        ?>
                        <input type="button" class="button_active d-flex justify-content-center" value="OK" onclick="location.href='indexadmin.php';" />
                        <?php
                        break 1;
                    }
                    if($u['typ_uzytkownik'] == 2){
                        $check = 0;
                        ?>
                        <input type="button" class="button_active d-flex justify-content-center" value="OK" onclick="location.href='indexUser.php';" />
                        <?php
                        break 1;
                    }
                }else $check = 1;
            }
            if ($check == 1) {
                echo "Login Failed";
                ?>
                <input type="button" class="button_active d-flex justify-content-center" value="BACK" onclick="location.href='index.php';" />
                <?php
            }
        ?>
    </body>
</html>