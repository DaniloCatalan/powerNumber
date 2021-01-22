<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtengo los ultimos 5 juegos del usuario
        //ordenado descendentemente

        $scores = auth()->user()->scores->sortDesc()->take(5);
        return view('score.index')->with('scores',$scores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('score.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //obtengo data y la valido, solo como obligatorios
        $data = request()->validate([
            'user_value'=>'required|integer|between:1,10',
        ]);

        $status='';
        $user=$data['user_value'];
        $machine = rand(1,10);

        if ($machine%2==0)
        {
            if($user>$machine){
                $status='1';
            }else 
            {
                $status='0';
            }
        }
        else{
            if($user<$machine){
                $status='1';
            }else 
            {
                $status='0';
            }
        }

        //almaceno los valores obtenidos
        $result = auth()->user()->scores()->create([
            'user_value'=>$data['user_value'],
            'machine_value'=>$machine,
            'status'=>$status,
        ]);

        //redirecciono al registro ya juardado en la bd pasandole el id asignado
        return redirect()->action('ScoreController@show',['score'=>$result->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //retorno a la vista con los resultados del juego
        return view('score.show')->with('score',$score);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }
}
