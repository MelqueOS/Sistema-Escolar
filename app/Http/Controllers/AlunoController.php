<?php

namespace App\Http\Controllers;
use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Models\Turma;
class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
		$turmas = Turma::All();
		$aluno = new Aluno();
		$alunos = Aluno::All();
		return view(
			"sistema-escolar.aluno.aluno",
			[
				"aluno" => $aluno,
				"alunos" => $alunos,
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
			$aluno = Aluno::Find($request->get('id'));
			$status = "atualizado";
		}else{
			$aluno = new Aluno();
			$status = "salvo";
		}
		$aluno->nome_aluno = $request->get("nome_aluno");
		$aluno->email = $request->get("email");
		$aluno->matricula = $request->get("matricula");
		$aluno->turma_id = $request->get("turma_id");
		$aluno->save();
		$request>session()->flash("status", $status);
		return redirect("/aluno");
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
		$turmas = Turma::All();
        $aluno = Aluno::Find($id);
		$alunos = Aluno::All();
		return view(
			"sistema-escolar.aluno.aluno",
			[
				"aluno" => $aluno,
				"alunos" => $alunos,
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
        $aluno = Aluno::Find($id);
		/*
		$notas = DB::table('nota')->where("aluno_id", "=",$id)->count();
		if($notas > 0){
			$status = "erro_exc";
		}else{
			$aluno->delete();
			$status = "excluido";
		}
		*/
		$aluno->delete();
		$status = "excluido";
		$request>session()->flash("status", $status);
		return Redirect("/aluno");
    }
}
