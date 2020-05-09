@extends('layouts.bootstrap')
@section('title', 'Cadastrar categoria')


@section('content')
    <h2>Cadastrar categoria</h2>

    <form method="post" action="{{ route('categ.store') }}" class="card p-3">
        @csrf
        <input value="Revistas" class="form-control my-3" type="text" name="name" placeholder="Nome da categoria" required>
        <input value="News" class="form-control my-3" type="text" name="slug" placeholder="Slug da categoria" required>
        <div class="text-center my-3">
            <button type="submit" class="btn btn-outline-info">Cadastrar</button>
        </div>
    </form>
@endsection
