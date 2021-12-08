@extends ("sistema-escolar.template")
@section("titulo", "Alunos")
@section("cadastro")
<div class="">
    <form method="POST" action="/aluno">
        <div class="" >
            <div class="">
                <label for="campoNome">Nome do aluno(a)</label>
                <input type="text" id="campoNome" name="nome_aluno" class=""  value = "{{'aluno->nome_aluno'}}"/>
            </div>
			<div class="">
                <label for="campoEmail">Email</label>
                <input type="text" id="campoEmail" name="email" class=""  value = "{{'aluno->email'}}"/>
            </div>
			<div class="">
                <label for="campoMatricula">Matricula</label>
                <input type="text" id="campoMatricula" name="matricula" class=""  value = "{{'aluno->matricula'}}"/>
            </div>
			<div class="">
				<label class="">Turmas</label>
				<select id = "selecaoTurma" class="" name = "turma" >
					<option value = "" selected = "selected">Selecione uma turma</option>
					<option value = "{{'$turma->id'}}" selected = "selected">{{'$turma->nome_turma'}}</option>
					<option value = "{{'$turma->id'}}" >{{'$turma->nome_turma'}}</option>
				</select>
			</div>

        </div>
        <button type="submit" class="">Salvar</button>
        @csrf
        <input type = "hidden" name = 'id' value = "{{'aluno->id'}}"/>
    </form>
</div>
@endsection
@section("listagem")
<table class="">
	<thead class="">
		<th scope="col">Aluno</th>
		<th scope="col"> Email </th>
		<th scope="col"> Matricula </th>
		<th scope="col" colspan = "2">Ações</th>
	</thead>
	<tbody>
		<tr>
			<td>{{'aluno->nome_aluno'}}</td>
			<td>{{'aluno->email'}}</td>
			<td>{{'aluno->matricula'}}</td>
			<td><a href = "/aluno/{{'aluno->id'}}/edit" class="">Editar</a></td>
			<td>
				<form method = "POST" action = "/aluno/{{'aluno->id'}}">
					<input type = "hidden" name = "_method" value = "DELETE"/> 
					@csrf
					<input type = "submit" id = "excluirBotao" class="" value = "Excluir"/>
				</form>
			</td>
		</tr>
	</tbody>
</table>
@endsection