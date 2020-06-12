<?php
    try{
        #$dBase = new PDO("mysql:host=localhost:3307;dbname=projektpwl", "root", "");
        $dBase = new PDO("mysql:host=localhost;dbname=danql45", "danN123", "!Dan2020");
    }catch(PDOException $e){
        echo "Połączenie z bazą danych zakończone niepowodzeniem: " . $e->getMessage();
    return;
    }

    $id = $_GET['id_comment'];

    $dBase->query("DELETE FROM comment WHERE id_comment = ".$id);

    header('Location: okazjaview.php?numokazja=' . $_GET['id_okazja']);
        
?>