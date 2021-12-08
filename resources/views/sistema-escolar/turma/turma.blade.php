@extends ("sistema-escolar.template")
@section("titulo", "Turmas")
@section("cadastro")

<div class="">
    <form method="POST" action="/turma">
        <div class="" >
            <div class="">
                <label for="campoNome">Nome da turma</label>
                <input type="text" id="campoNome" name="nome_turma" class=""  value = "{{'turma->nome_turma'}}"/>
            </div>
			<div class="">
                <label for="campoCurso">Nome do curso</label>
                <input type="text" id="campoCurso" name="nome_curso" class=""  value = "{{'turma->nome_curso'}}"/>
            </div>
        </div>
        <button type="submit" class="">Salvar</button>
        @csrf
        <input type = "hidden" name = 'id' value = "{{'turma->id'}}"/>
    </form>
</div>
   
@endsection
@section("listagem")

<table class="">
	<thead class="">
		<th scope="col">Nome da turma</th>
		<th scope="col"> Curso </th>
		<th scope="col" colspan = "2">Ações</th>
	</thead>
	<tbody>
		<tr>
			<td>{{'turma->nome_turma'}}</td>
			<td>{{'turma->nome_curso'}}</td>
			<td><a href = "/turma/{{'turma->id'}}/edit" class="">Editar</a></td>
			<td>
				<form method = "POST" action = "/turma/{{'turma->id'}}">
					<input type = "hidden" name = "_method" value = "DELETE"/> 
					@csrf
					<input type = "submit" id = "excluirBotao" class="" value = "Excluir"/>
				</form>
			</td>
		</tr>
	</tbody>
</table>
@endsection