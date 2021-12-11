@extends ("sistema-escolar.template")
@section("titulo", "Notas")
@section("extra")
	<form method="GET" action="/nota/create">
        <div class="col-6">
			<label class="h3">Turmas</label>
			<select id = "selecaoTurma" class="form-select" name = "turma"  onchange="this.form.submit()">
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
				<label class="h5">Turma: {{$escolhida->nome_turma}}</label>
			</div>
			@foreach($alunos as $aluno)
            <div class="">
					<label for="campoAluno" class = "h5">Aluno</label>
					<input type="text" id="campoAluno" name="nome_aluno" class="h6 col-2"  value = "{{$aluno->nome_aluno}}" disabled="" required/>
					<input type = "hidden" name = 'aluno_id[]' value = "{{$aluno->id}}"/>
					<?php 
						$not = false;
						$in = 0;
						$iv = 0;
					?>
					
					<label for="campoNota" class="h5">Nota</label>
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
        <button type="submit" class="btn btn-primary">Salvar</button>
        @csrf
    </form>
	@else
		<h1>Nenhuma turma selecionaoda</h1>
	@endif
</div>
@endsection