@extends ("sistema-escolar.template")
@section("titulo", "Turmas")
@section("cadastro")

<div class="">
    <form method="POST" action="/turma">
        <div class="form-group col-6" >
            <div class="">
                <label for="campoNome">Nome da turma</label>
                <input type="text" id="campoNome" name="nome_turma" class="form-control" maxlength="100" value = "{{$turma->nome_turma}}" required/>
            </div>
			<div class="">
                <label for="campoCurso">Nome do curso</label>
                <input type="text" id="campoCurso" name="nome_curso" class="form-control"  maxlength="100" value = "{{$turma->nome_curso}}" required/>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        @csrf
        <input type = "hidden" name = 'id' value = "{{$turma->id}}"/>
    </form>
</div>
   
@endsection
@section("listagem")

<table class="table dark">
	<thead class="thead-dark">
		<th scope="col" class="h4">Nome da turma</th>
		<th scope="col" class="h4"> Curso </th>
		<th scope="col" colspan = "2" class="h4">Ações</th>
	</thead>
	<tbody>
		@foreach($turmas as $turma)
		<tr>
			<td class="h5">{{$turma->nome_turma}}</td>
			<td class="h5">{{$turma->nome_curso}}</td>
			<td><a href = "/turma/{{$turma->id}}/edit" class="btn btn-dark">Editar</a></td>
			<td>
				<form method = "POST" action = "/turma/{{$turma->id}}">
					<input type = "hidden" name = "_method" value = "DELETE"/> 
					@csrf
					<input type = "submit" id = "excluirBotao" class="btn btn-danger" value = "Excluir"/>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection