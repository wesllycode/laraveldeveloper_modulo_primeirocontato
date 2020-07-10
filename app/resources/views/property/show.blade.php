@extends('property.index')
@section('content')
<h1> Página Visualização do Imóvel</h1>
<?php

if(!empty($properties)){
    foreach($properties as $property){
    ?>
        <p><b>Nome do Imóvel:</b><?= $property->title ?></p>
        <p><b>Descrição:</b><?= $property->description ?></p>
        <p><b>Valor de Aluguel:</b> R$ <?= number_format($property->rental_price,2,',','.')?></p>
        <p><b>Valor de venda:</b> R$ <?= number_format($property->sale_price,2,',','.')?></p>
        <p><b>Foto do Imóvel:</b><br>
            <?php
             if(!empty($property->img) ){
                  echo "<img src='$property->img'>";
             }else{
                 echo "<font color='red'>CADASTRE UMA FOTO </font></b>";
             }
             ?>

    <?php
    }
}else{
    return redirect()->action('PropertyController@index');
}
 ?>

<br>
<a href="<?= url("/imoveis/") ?>">VOLTAR A PÁGINA</a>
@endsection
