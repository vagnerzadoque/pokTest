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

foreach ($array[0]['pokemon'] as $chave => $valor) {
    
    $key = $chave;
    $value = $valor;


}

?>

<div class="container">
    <div class="row">
    <h1>Branch do Bruno</h1>
    <h2>Testa por vagner</h2>
<?php for($i=0; $i < 5; $i++):?>
                <div class="col-lg-3 mb-3">
                    <div class="card" >
                                <img class="card-img-top bg-primary" src="<?=$value['img'];?>" alt="Imagem de capa do card">
                            <div class="card-body ">
                                    <h5 class="card-title"><?=$value['name'];?></h5>
                                    <p class="card-text"><?=$value['height'];?></p>
                                    <p class="card-text"><?=$value['weight'];?></p>
                                    <p class="card-text"><?=$value['candy'];?></p>
                                    <?php foreach($value['type'] as $val): ?>
                                    <a href="#" class="btn btn-primary"><?=$val;?></a>
                                    <?php endforeach;?>
                            </div>
                    </div>
            
                </div>
    
    <?php endfor; ?>
    </div>
</div>









<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>