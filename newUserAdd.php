<?php
        try{
            #$dBase = new PDO("mysql:host=localhost:3307;dbname=projektpwl", "root", "");
            $dBase = new PDO("mysql:host=localhost;dbname=danql45", "danN123", "!Dan2020");
        }catch(PDOException $e){
            echo "Połączenie z bazą danych zakończone niepowodzeniem: " . $e->getMessage();
        return;
        }

        $sql = 'INSERT INTO uzytkownik (typ_uzytkownik, imie, nazwisko, e_mail, loginn, pass_SHA512) 
        VALUES (2, :imie, :nazwisko, :email, :loginn, :pass_SHA512)';
        $sth = $dBase->prepare($sql);
        $sth->bindValue(':imie', $_GET['imie'], PDO::PARAM_STR);
        $sth->bindValue(':nazwisko', $_GET['nazwisko'], PDO::PARAM_STR);
        $sth->bindValue(':email', $_GET['email'], PDO::PARAM_STR);
        $sth->bindValue(':loginn', $_GET['loginn'], PDO::PARAM_STR);
        $sth->bindValue(':pass_SHA512', $_GET['haslo'], PDO::PARAM_STR);
        $sth->execute();
        header("Location: index.php");
    ?>


