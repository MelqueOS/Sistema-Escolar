@extends ("sistema-escolar.template")
@section("titulo", "Notas")
@section("extra")
	<form method="GET" action="/nota/create">
        <div class="">
			<label class="">Turmas</label>
			<select id = "selecaoTurma" class="" name = "turma"  onchange="this.form.submit()">
				<option value = "" selected = "selected">Selecione uma turma</option>
				@foreach($turmas as $turma)
					@if($turma->id == $escolhida->id)
						<option value = "{{$escolhida->id}}" selected = "selected">{{$escolhida->nome_turma}}</option>
					@else
						<option value = "{{$turma->id}}">{{$turma->nome_turma}}</option>
					@endif
				@endforeach
				@csrf
			</select>
		</div>
	</form>	
@endsection

@section("cadastro")
<div class="">
    @if($habilitado)
	<form method="POST" action="/nota">
        <div class="" >
			<div class="">
				<label class="">Turma: {{$escolhida->nome_turma}}</label>
			</div>
			@foreach($alunos as $aluno)
            <div class="">
					<label for="campoAluno">Aluno</label>
					<input type="text" id="campoAluno" name="nome_aluno" class=""  value = "{{$aluno->nome_aluno}}" disabled="" required/>
					<input type = "hidden" name = 'aluno_id[]' value = "{{$aluno->id}}"/>
					<?php 
						$not = false;
						$in = 0;
						$iv = 0;
					?>
					
					<label for="campoNota">Nota</label>
					@foreach($notas as $nota)
						@if($aluno->id == $nota->aluno_id)
							<?php 
								$not = true;	
							?>
							@break
						@endif	
				    @endforeach
					@if($not == true)
						<input type="number" id="campoNota" name="valor[]" class=""  min = "0" max = "10" value = "{{$nota->valor}}" required/>
						<input type="hidden" name = "id[]" value = "{{$nota->id}}" >
					@else
						<input type="number" id="campoNota" name="valor[]" class=""  min = "0" max = "10" value = "" required/>
						<input type="hidden" name = "id[]" value = "" >
					@endif
					
					<input type="hidden" name = "conte[]" value = ""/>
            </div>
			@endforeach
        </div>
        <button type="submit" class="">Salvar</button>
        @csrf
    </form>
	@else
		<h1>Nenhuma turma selecionaoda</h1>
	@endif
</div>
@endsection