<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
<?php

$array[]= json_decode(file_get_contents('https://raw.githubusercontent.com/Biuni/PokemonGO-Pokedex/master/pokedex.json'), true);
//$Plist= json_decode(file_get_contents('https://raw.githubusercontent.com/Biuni/PokemonGO-Pokedex/master/pokedex.json'), true);
$pokeList = $array[0]['pokemon'];


$interval = 4;

if(!empty($_GET['p'])){
    $page = $_GET['p'];
} else {
    $page = 1;
}

$firstID = $page === 1 ? 1 : ($page * $interval - $interval) + 1;
$lastID = $page === 1 ? $interval : ($page * $interval);

function paginate ($arr) {
    global $firstID;
    global $lastID;
    return $firstID <= $arr['id'] && $lastID >= $arr['id'];
}



$renderList = array_filter( $pokeList, 'paginate');

$size = count($pokeList);
$limit = ceil($size / $interval);


        foreach ($array[0]['pokemon'] as $chave => $valor) {
            
            $key = $chave;
            $value[] = $valor;


        }


?>



<div class="container">
<h1>RENDER LIST</h1>
    <div class="row">
    
    
        <?php foreach($renderList as $card):?>
        
                        <div class="col-lg-3 mb-3">
                            <div class="card" >
                            <p><?= $card['id'] ?></p>
                                        <img class="card-img-top bg-primary" src="<?=$card['img'];?>" alt="Imagem de capa do card">
                                    <div class="card-body ">
                                            <h5 class="card-title"><?=$card['name'];?></h5>
                                            <p class="card-text"><?=$card['height'];?></p>
                                            <p class="card-text"><?=$card['weight'];?></p>
                                            <p class="card-text"><?=$card['candy'];?></p>
                                            <?php foreach($card['type'] as $val): ?>
                                            <a href="#" class="btn btn-primary"><?=$val;?></a>
                                            <?php endforeach;?>
                                    </div>
                            </div>
                    
                        </div>
            
                                            <?php endforeach; ?>
    </div>
</div>


<div class="row">
<div class="container">
<nav aria-label="Navegação de página exemplo">
  <ul class="pagination">
    <?php
    if($page > 1){ ?>
        <li class="page-item"><a class="page-link" href="?p=1">Inicio</a></li>

    <?php } ?>                                       
    <li class="page-item"><a class="page-link" href="?p=<?=$page - 1 > 1 ? $page - 1 : '1' ?>">Anterior</a></li>
    
    <?php
        $quantityLinks = 3;

            for ($i=0; $i < $quantityLinks; $i++) { 
                $linkDow = $page - ($quantityLinks - $i);
                if($linkDow != $page && $linkDow > 0) {
                    ?>
                    <li class="page-item"><a class="page-link" href="?p=<?=$linkDow?>"><?=$linkDow?></a></li>
                    <?php
                }
            }

    ?>
    <li class="page-item active"><a class="page-link" href="#"><?=$page?></a></li>
    <?php


for ($i= 1; $i <= $quantityLinks; $i++) {
    $linkUp = $page +$i;
    if($linkUp <= $limit){
            ?>  
                <li class="page-item"><a class="page-link" href="?p=<?=$linkUp ?>"><?=$linkUp?></a></li>
            <?php

}
            }


    ?>
    <li class="page-item"><a class="page-link" href="?p=<?=$page + 1 <= $limit ? $page + 1 : $limit ?>">Próximo</a></li>
    
  <?php 
  if($page < $limit){ ?>  
    <li class="page-item"><a class="page-link" href="?p=<?=$limit?>">Fim</a></li>
  <?php }?>
  
  </ul>
</nav>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>