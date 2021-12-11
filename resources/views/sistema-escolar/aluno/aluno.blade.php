@extends ("sistema-escolar.template")
@section("titulo", "Alunos")
@section("cadastro")
<div class="">
    <form method="POST" action="/aluno">
        <div class="form-group col-6" >
            <div class="">
                <label for="campoNome" class="h5">Nome do aluno(a)</label>
                <input type="text" id="campoNome" name="nome_aluno" class="form-control"  maxlength="100" value = "{{$aluno->nome_aluno}}" required/>
            </div>
			<div class="">
                <label for="campoEmail" class="h5">Email</label>
                <input type="email" id="campoEmail" name="email" class="form-control" maxlength="30"  value = "{{$aluno->email}}" required/>
            </div>
			<div class="">
                <label for="campoMatricula" class="h5">Matricula</label>
                <input type="text" id="campoMatricula" name="matricula" class="form-control" maxlength="10" value = "{{$aluno->matricula}}" required/>
            </div>
			<div class="form-group">
				<label class="h5">Turmas</label>
				<select id = "selecaoTurma" class="form-select" name = "turma_id" required>
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
        <button type="submit" class="btn btn-primary">Salvar</button>
        @csrf
        <input type = "hidden" name = 'id' value = "{{$aluno->id}}"/>
    </form>
</div>
@endsection
@section("listagem")
<table class="table dark">
	<thead class="thead-dark">
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
			<td><a href = "/aluno/{{$aluno->id}}/edit" class="btn btn-dark">Editar</a></td>
			<td>
				<form method = "POST" action = "/aluno/{{$aluno->id}}">
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