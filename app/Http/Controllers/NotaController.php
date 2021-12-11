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
		/*
		Aqui é carregado um formulario simples com um select com todas as turmas cadastradas
		É passado uma variavel booleana que desabilita o formulario de notas, 
		A principio é passado uma turma vazia como a escolhida
		*/
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
		/*
			Aproveitei esse metodo para fazer o retorno para a pagina com os dados de edição
			Aqui serão retornados os dados referentes a turma escolhida, os alunos pertencente a essa turma e 
			e as notas existentes
			É passado uma variavel booleano que habilita o formulario de notas
			No formulario de notas sera verificado se o aluno tem ou não nota cadastrada para a materia escolhida,
			se o aluno tiver nota é habilitado um campo para edição com a nota atual, do contrario é habilitado
			um campo vazio para adicionar a nota. Assim é possivel listar, submeter formularios para criar e atualiza notas antigas (ou manter), tudo ao mesmo tempo e no mesmo formulario 			
			
		*/
		if($request->get("turma") != ""){
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
		}else{
			return redirect("/nota");
		}
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
		/*
		É recebido um array com todos as notas, IDs de alunos e IDs de notas
		É verificado para cada id de nota se a nota ja existe
		Se existir é buscado os valores anteriores e atualizados pelos novos
		Se não existir é criado uma nova nota no banco
		*/
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
