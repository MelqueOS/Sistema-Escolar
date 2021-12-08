@extends ("sistema-escolar.template")
@section("titulo", "Notas")
@section("cadastro")
<div class="">
    <form method="POST" action="/nota">
        <div class="" >
			<div class="">
				<label class="">Turmas</label>
				<select id = "selecaoTurma" class="" name = "turma" >
					<option value = "" selected = "selected">Selecione uma turma</option>
					<option value = "{{'$turma->id'}}" selected = "selected">{{'$turma->nome_turma'}}</option>
					<option value = "{{'$turma->id'}}" >{{'$turma->nome_turma'}}</option>
				</select>
			</div>
            <div class="">
                <label for="campoAluno">Aluno</label>
                <input type="text" id="campoAluno" name="nome_aluno" class=""  value = "{{'aluno->nome_aluno'}}"/>
				<input type = "hidden" name = 'idaluno' value = "{{'aluno->id'}}"/>
            </div>
			<div class="">
                <label for="campoNota">Nota</label>
                <input type="text" id="campoNota" name="valor" class=""  value = "{{'nota->valor'}}"/>
            </div>
        </div>
        <button type="submit" class="">Salvar</button>
        @csrf
        <input type = "hidden" name = 'id' value = "{{'nota->id'}}"/>
    </form>
</div>
@endsection