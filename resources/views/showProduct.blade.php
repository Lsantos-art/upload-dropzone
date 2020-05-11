@extends('layouts.bootstrap')
@section('title', $product->name)

@php
    $primeiroActive = true;
@endphp

@section('content')
    <h2>Exibindo produto: {{ $product->name }}</h2>
        <div class="card my-3 p-3 d-flex justify-content-center text-center">
            <h5>Preço: {{ $product->price }}</h5>
            <div class="my-3 d-flex justify-content-center">
                <div id="carouselExampleControls" class="carousel slide col-md-4" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($product->images as $image)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ $image->link }}" class="d-block w-100" alt="{{ $image->name }}" style="max-width: 600px">
                        </div>
                        @endforeach
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <hr>
            <h3 class="my-2">Descrição</h3>
            <p class="my-3 text-center">
                {{ $product->description }}
            </p>
@endsection
