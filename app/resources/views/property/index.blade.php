@extends('property.master')
@section('content')
<h1> Listagem de Produtos </h1>



<?php

if(!empty($properties)){
    echo "<table>";
    echo "<tr>
                <td>Título</td>
                <td>Valor de locação</td>
                <td>Valor de compra</td>
                <td>Ações</td>
              </tr>";
    foreach($properties as $property){

        $linkReadMode = url('imoveis/visualizar/' . $property->nameslugimovel);
        $linkEditItem = url('imoveis/editar/' .  $property->nameslugimovel);
        $linkRemoveItem = url('imoveis/remover/' . $property->nameslugimovel);
        echo "<tr>
                <td>{$property->title}</td>
                <td>R$ ".number_format($property->rental_price)."</td>
                <td>R$ ".number_format($property->sale_price)."</td>
                <td><a href='{$linkReadMode}'>Ver</a> | <a href='{$linkEditItem}'>Editar</a> |  <a href='{$linkRemoveItem}'>Excluir</a></td>
              </tr>";
    }
    echo "</table>";
}

?>
    @endsection
