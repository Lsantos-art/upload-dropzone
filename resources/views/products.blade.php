@extends('layouts.bootstrap')
@section('title', 'Produtos')

@section('content')
    <h1 class="my-3 p-3 text-center">Produtos cadastrados</h1>
    <div class="d-flex justify-content-center p-3">
        @if (isset($products))

            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a class="btn btn-indigo" href="{{ route('product.show', $product->id) }}">Detalhes</a>
                        <a class="btn btn-primary" href="#">Editar</a>
                        <a class="btn btn-danger" href="#">Deletar</a>
                    </td>
                </tr>
                    @endforeach
                    @else
                    <td>Nenhuma produto cadastrado...</td>
                </tbody>
            </table>

        @endif
    </div>



@endsection
