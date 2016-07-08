@extends('content.produtos._header')

@include('content.produtos.index.js')

{{--TODO: listagem de produtos--}}
@section('content')
    <p style="text-align: right;">
        <a href="{!! route('produto.create') !!}" role="button">{!! trans('produto.index.buttonCreate') !!}</a>
    </p>

    <table id="tblProdutos">
        <thead>
        <tr>
            <th>{{-- Código --}}</th>
            <th>{!! trans('produto.index.thName') !!}</th>
            <th>{!! trans('produto.index.thPrice') !!}</th>
            <th>{!! trans('produto.index.thDescription') !!}</th>
            <th>{!! trans('produto.index.thCategory') !!}</th>
            <th>{!! trans('produto.index.thActions') !!}</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
@endsection
