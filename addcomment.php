<?php
    try{
        #$dBase = new PDO("mysql:host=localhost:3307;dbname=projektpwl", "root", "");
        $dBase = new PDO("mysql:host=localhost;dbname=danql45", "danN123", "!Dan2020");
    }catch(PDOException $e){
        echo "Połączenie z bazą danych zakończone niepowodzeniem: " . $e->getMessage();
    return;
    }

    $name = $_POST["name"];
    $comment = $_POST["comment"];
    $id = $_POST['id_okazja'];

    $dBase->query("INSERT INTO comment VALUES('','$id','$name','$comment')");

    header('Location: okazjaview.php?numokazja=' . $_POST['id_okazja']);
        
?>