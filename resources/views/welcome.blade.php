@extends('layouts.bootstrap')
@section('title', 'Home')


@section('content')

    <a href="{{ route('categ.form') }}" class="btn btn-outline-gray-dark my-3">Cadastrar categoria</a>
    <a href="{{ route('products.form') }}" class="btn btn-outline-gray-dark my-3">Cadastrar produto</a>

@endsection


