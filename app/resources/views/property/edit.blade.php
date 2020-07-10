@extends('property.master')
@section('content')

<h1> Editar o imóvel</h1>
<?php
    if(!empty($property)){
        $property = $property[0];
        ?>

    <form action="<?= url('/imoveis/update',['id' => $property->id]); ?>" method="post">
        <?= csrf_field(); ?>
        <?= method_field('PUT'); ?>
            <label for="title">Título do Imóvel</label>
            <input type="text" value="<?= $property->title ?>" name="title" id="title">
        <br>
            <label for="description">Descrição</label>
            <textarea name="description" id="description" cols="40" row="10"><?= $property->description ?></textarea>
        <br>
            <label for="rental_price">Valor de Aluguel</label>
            <input type="text" value="<?= $property->rental_price ?>" name="rental_price" id="rental_price">
        <br>
            <label for="sale_price">Valor de Venda</label>
            <input type="text" value="<?= $property->sale_price ?>" name="sale_price" id="sale_price">
        <br>
        <br>
        <label for="img">Imagem</label>
        <input type="text" value="<?= $property->img ?>" name="img" id="img">
        <br>
        <button type="submit">Atualizar</button>
        <a href="<?= url('/imoveis/') ?>">Voltar</a>
    </form>
<?php
    }else{
        return redirect()->action('PropertyController@index');
    }
?>

    @endsection
