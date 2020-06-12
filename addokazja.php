
<?php
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

    if(isset($_GET['szukaj'])){
        $oka = $dBase->query('SELECT * from okazja WHERE tytul_okazja LIKE "%' . $_GET['szukaj'] . '%"' );
    }else if(isset($_GET['sortby'])){
        $oka = $dBase->query('SELECT * from okazja ORDER BY '.$_GET['sortby'] . ' DESC ');
    }
    else{
        $oka = $dBase->query('SELECT * from okazja ORDER BY data_dodania DESC');
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
        
?>

<div class="container-1">
<form method="POST" action="okazjaview.php" style="width: 100%;">
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
                <div class="opisokazja text-truncate text-wrap" style="height: 204px; line-height: 1.2"><p><?=$o['opis_okazja']?></p></div>
                <div><strong>Cena: <?=$cost?> zł</strong></div>
                <button class="btn btn-dark" name="numokazja" value="<?=$numokazja?>" type="submit" style="padding: 2px;">Przejdź do okazji</button>
            </div>
        </div>
    </div>
</form>
</div>
<?php
    }
?>

