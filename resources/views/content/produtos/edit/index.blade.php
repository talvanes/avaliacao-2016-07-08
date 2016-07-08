@extends('content.produtos._header')

{{--TODO: formulário de edição--}}
@section('content')
    <form method="post" action="{!! route('route.update', ['id' => $id]) !!} " enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}

        <label for="nome">
            {!! trans('produto.create.labelName') !!}
            <input type="text" id="nome" name="productName">
        </label>

        <label for="descricao">
            {!! trans('produto.create.labelDescription') !!}
            <input type="text" id="descricao" name="productDescription">
        </label>

        <label for="preco">
            {!! trans('produto.create.labelPrice') !!}
            <input type="number" id="preco" name="productPrice">
        </label>

        <label for="foto">
            {!! trans('produto.create.labelPicture') !!}
            <input type="file" id="foto" name="productPicture">
        </label>

        <button type="submit">{!! trans('produto.create.buttonEnviar') !!}</button>

    </form>
@endsection