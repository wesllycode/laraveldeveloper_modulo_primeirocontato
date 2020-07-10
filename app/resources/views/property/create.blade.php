@extends('property.master')
@section('content')
<h1>Formulário de Cadastro :: Imóveis </h1>

<form action="<?= url('/imoveis/fazerCadastroImovel'); ?>" method="post">
    <?= csrf_field(); ?>
        <label for="title">Título do Imóvel</label>
        <input type="text" name="title" id="title">
    <br>
        <label for="description">Descrição</label>
        <textarea name="description" id="description" cols="40" row="10"></textarea>
    <br>
        <label for="rental_price">Valor de Aluguel</label>
        <input type="text" name="rental_price" id="rental_price">
    <br>
        <label for="sale_price">Valor de Venda</label>
        <input type="text" name="sale_price" id="sale_price">
    <br>
    <br>
    <label for="img">Imagem</label>
    <input type="text" name="img" id="img">
    <br>
    <button>Cadastrar</button>
</form>
@endsection
