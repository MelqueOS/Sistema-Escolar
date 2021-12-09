@extends ("sistema-escolar.template")
@section("titulo", "Alunos")
@section("cadastro")
<div class="">
    <form method="POST" action="/aluno">
        <div class="" >
            <div class="">
                <label for="campoNome">Nome do aluno(a)</label>
                <input type="text" id="campoNome" name="nome_aluno" class=""  value = "{{$aluno->nome_aluno}}" required/>
            </div>
			<div class="">
                <label for="campoEmail">Email</label>
                <input type="email" id="campoEmail" name="email" class=""  value = "{{$aluno->email}}" required/>
            </div>
			<div class="">
                <label for="campoMatricula">Matricula</label>
                <input type="text" id="campoMatricula" name="matricula" class="" value = "{{$aluno->matricula}}" required/>
            </div>
			<div class="">
				<label class="">Turmas</label>
				<select id = "selecaoTurma" class="" name = "turma_id" required>
					<option value = "" selected = "selected">Selecione uma turma</option>
					@foreach($turmas as $turma)
						@if($turma->id == $aluno->turma_id)
							<option value = "{{$turma->id}}" selected = "selected">{{$turma->nome_turma}}</option>
						@else
							<option value = "{{$turma->id}}">{{$turma->nome_turma}}</option>
						@endif
					@endforeach
				</select>
			</div>

        </div>
        <button type="submit" class="">Salvar</button>
        @csrf
        <input type = "hidden" name = 'id' value = "{{$aluno->id}}"/>
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
		@foreach($alunos as $aluno)
		<tr>
			<td>{{$aluno->nome_aluno}}</td>
			<td>{{$aluno->email}}</td>
			<td>{{$aluno->matricula}}</td>
			<td><a href = "/aluno/{{$aluno->id}}/edit" class="">Editar</a></td>
			<td>
				<form method = "POST" action = "/aluno/{{$aluno->id}}">
					<input type = "hidden" name = "_method" value = "DELETE"/> 
					@csrf
					<input type = "submit" id = "excluirBotao" class="" value = "Excluir"/>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection