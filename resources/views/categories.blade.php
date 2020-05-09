@extends('layouts.app')
@section('title', 'Categorias')

@section('content')
    <h1 class="my-3 p-3 text-center">Categorias cadastradas</h1>
    <div class="d-flex justify-content-center p-3">
        @if (isset($categories))

            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $categorie)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $categorie->name }}</td>
                    <td>{{ $categorie->slug }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('categ.edit', $categorie->id) }}">Editar</a>
                        <a class="btn btn-danger" href="{{ route('categ.delete', $categorie->id) }}">Deletar</a>
                    </td>
                </tr>
                    @endforeach
                    @else
                    <td>Nenhuma categoria criada...</td>
                </tbody>
            </table>

        @endif
    </div>



@endsection
