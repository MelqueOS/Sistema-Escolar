<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use Illuminate\Support\Facades\DB;
use App\Models\Aluno;
class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$turma = new Turma();
		$turmas = Turma::All();
        return view(
				"sistema-escolar.turma.turma",
				[
					"turma" => $turma,
					"turmas" => $turmas
				]
		);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get('id')!=""){
			$turma = Turma::Find($request->get('id'));
			$status = "atualizado";
		}else{
			$turma = new Turma;
			$status = "salvo";
		}
		echo $request->get("nome_turma");
		$turma->nome_turma = $request->get("nome_turma");
		$turma->nome_curso = $request->get("nome_curso");
		$turma->save();
		$request>session()->flash("status", $status);
		return redirect("/turma");
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
        $turma = Turma::Find($id);
		$turmas = Turma::All();
        return view(
				"sistema-escolar.turma.turma",
				[
					"turma" => $turma,
					"turmas" => $turmas
				]
		);
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
    public function destroy($id, Request $request)
    {
        $turma = Turma::Find($id);
		$alunos = DB::table('aluno')->where("turma_id", "=",$id)->count();
		if($alunos > 0){
			$status = "erro_exc";
		}else{
			$turma->delete();
			$status = "excluido";
		}
		/*
		$turma->delete();
		$status = "excluido";
		*/
		$request>session()->flash("status", $status);
		return Redirect("/turma");
    }
}
