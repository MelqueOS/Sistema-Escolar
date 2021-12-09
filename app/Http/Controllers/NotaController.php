<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Turma;
use App\Models\Aluno;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$turmas = Turma::All();
		$habilitado = False;
		$escolhida = new Turma();
        return view("sistema-escolar.nota.nota",
			[
				"turmas" => $turmas,
				"habilitado" => $habilitado,
				"escolhida" => $escolhida
			]
		);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$escolhida = Turma::Find($request->get("turma"));
		$turmas = Turma::All();
		$habilitado = true;
		$alunos = DB::table("aluno")->where("turma_id", "=",$request->get("turma"))->get();
		$notas = Nota::All();
		return view("sistema-escolar.nota.nota",
			[
				"turmas" => $turmas,
				"escolhida" => $escolhida,
				"habilitado" => $habilitado,
				"alunos" => $alunos,
				"notas" => $notas
			]
		);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$status = "salvo";
		//dd($request);
		$data = []; // Criando um array vazio
		for ($i = 0; $i < count($request['conte']); $i++) {
			if($request["id"][$i] != ""){
				$nota = Nota::Find($request["id"][$i]);
			}else{
				$nota = new Nota();
			}
			$nota->aluno_id = $request["aluno_id"][$i];
			$nota->valor = $request["valor"][$i];
			$nota->save();
		}		
		$request>session()->flash("status", $status);
		return redirect("/nota");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
