@extends('layouts.app')
@section('botones')
    <a href="{{ route('score.index') }}" class="btn btn-primary">Volver</a>
@endsection
@section('content')
    <div class="row text-center">
        <div class="col-md-12"><h1>Jugemos</h1></div>
    </div>
    <p></p>
    <div class="row justify-content-center mt-3">
        <div class="col-md-4">
            <p>Bienvendo!</p>
            <p>Las reglas a seguir son pocas, siguelas y disfruta del juego!!</p>
            <ul class="">
                <li>Debes ingresar un número entre 1 y 10</li>
                <li>Luego de ingresar un numero si la maquina elige un numero par gana el mayor!</li>
                <li>Luego de ingresar un numero si la maquina elige un numero impar gana el menor!</li>
            </ul>
            <form action="{{route('score.store')}}" method="POST" novalidate>
                @csrf
                <div class="form-group">
                    <label for="user_value"><h3>Indica tu número</h3></label>
                    <input type="text" class="form-control @error('user_value') is-invalid @enderror" name="user_value" id="user_value" 
                    placeholder="0"
                    value="{{ old('user_value') }}"
                    >
                    @error('user_value')
                        <span class="invalid-feedback d-block" role="alert"></span>
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" value="Probar suerte.." class="btn btn-primary btn-block">
                </div>
            </form>
        </div>
    </div>
@endsection
