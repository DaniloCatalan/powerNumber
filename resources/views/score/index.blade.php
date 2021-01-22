@extends('layouts.app')
@section('botones')
    <a href="{{ route('score.create') }}" class="btn btn-primary">Jugar</a>
@endsection
@section('content')
    <h1 class="text-center mb-5">Tus resultados</h1>
    <div class="col-md-10 mx-auto p-3">
        <table class="table">
            <thead class="bg-primary">
                <tr>
                    <th>Juego</th>
                    <th>Tu Selección</th>
                    <th>Oponente</th>
                    <th>Resultado</th>
                </tr> 
            </thead>
            <tbody>
                @foreach($scores as $score)
                    <tr>
                        <td>{{ $score->id }}</td>
                        <td>{{ $score->user_value }}</td>
                        <td>{{ $score->machine_value }}</td>
                        <td>{{ $score->status == 1 ? '¡Ganaste esta ronda!' : 'Más suerte para la proxima' }}</td>
                    </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>

@endsection