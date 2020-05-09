@extends('layouts.bootstrap')
@section('title', 'Cadastrar categoria')


@section('content')
    <h2>Editar categoria</h2>

    <form method="post" action="{{ route('categ.update') }}" class="card p-3">
        @csrf
        <input name="id" type="hidden" value="{{ $categorie->id }}">
        <input value="{{ $categorie->name }}" class="form-control my-3 text-success" type="text" name="name" placeholder="Nome da categoria" required>
        <input value="{{ $categorie->slug }}" class="form-control my-3 text-success" type="text" name="slug" placeholder="Slug da categoria" required>
        <div class="text-center my-3">
            <button type="submit" class="btn btn-outline-info">Editar</button>
        </div>
    </form>
@endsection
