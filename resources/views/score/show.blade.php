@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <h1>Fin del Juego!</h1>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12 text-center">
            <h2>Tu selección : {{ $score->user_value }}</h2>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12 text-center">
            <h2>Tu Oponente: {{$score->machine_value }}</h2>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12 text-center">
            <h2>{{ $score->status == 1 ? '¡Ganaste esta ronda!' : 'Más suerte para la proxima..' }}</h2>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12 text-center">
            <a href="{{ route('score.create')}}" class="btn btn-primary">Jugar nuevamente</a>
            <a href="{{ route('score.index')}}" class="btn btn-primary">Ver historial de mis juegos </a>
        </div>
    </div>
@endsection