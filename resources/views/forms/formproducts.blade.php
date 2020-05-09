@extends('layouts.bootstrap')
@section('title', 'Cadastrar produto')


@section('content')
    <h2>Cadastrar produtos</h2>

    <form method="post" action="{{ route('products.store') }}" class="card p-3">
        @csrf
        <input class="form-control my-3" type="text" name="name" placeholder="Nome do produto" required>
        <textarea class="form-control my-3" name="description" placeholder="Descrição do produto" required></textarea>
        <input class="form-control my-3" type="text" name="price" placeholder="Preço" required>
        <input class="form-control my-3" type="text" name="images" placeholder="Link da imagem" required value="http://placehold.jp/150x150.png">

        <select name="categorie">
            @if (isset($categories))
            <option value="" class="disabled">Escolher categoria</option>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                @endforeach
                @else
                    <option value="" class="disabled">Nenhuma categoria cadastrada</option>
            @endif
        </select>
        <div class="text-center my-3">
            <button type="submit" class="btn btn-outline-info">Cadastrar</button>
        </div>
    </form>
@endsection
