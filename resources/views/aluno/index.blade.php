@extends("template/web")

@section("titulo", "Cadastro de Alunos")

@section("formulario")
	<h3>Cadastro de Alunos</h3>
	<form method="POST" action="/aluno" class="row">
		
		@csrf
		<input type="hidden" name="id" value="{{ $aluno->id }}" //>
	
		<div class="form-group col-4">
			<label for="nome">Nome: </label>
			<input type="text" name="nome" class="form-control" value="{{ $aluno->nome }}" required />
		</div>
		<div class="form-group col-4">
			<label for="email">E-mail: </label>
			<input type="text" name="email" class="form-control" value="{{ $aluno->email }}" required />
		</div>
		<div class="form-group col-4">
			<label for="matricula">Matricula: </label>
			<input type="text" name="matricula" class="form-control" value="{{ $aluno->matricula }}" required />
		</div>
		<div class="form-group col-4">
			<label for="turma">Turma: </label>
			<select name="turma" class="form-control" required>
				<option></option>
				@foreach ($turmas as $turma)
					@if ($turma->id == $aluno->turma)
						<option value="{{ $turma->id }}" selected="selected">{{ $turma->n_turma }}</option>
					@else
						<option value="{{ $turma->id }}">{{ $turma->n_turma }}</option>
					@endif
					
				@endforeach
			</select>
		</div>
		
		<div class="form-group col-4">
			<a href="/aluno" class="btn btn-primary bottom">
				<i class="fas fa-plus"></i>
				Novo
			</a>
			<button type="submit" class="btn btn-success bottom">
				<i class="fas fa-save"></i>
				Salvar
			</button>
		</div>
	</form>
@endsection	

@section("tabela")
	<h3>Listagem de Alunos</h3>
	<table class="table table-striped">
		<colgroup>
			<col width="200">
			<col width="200">
			<col width="80">
			<col width="80">
		</colgroup>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Turma</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($alunos as $aluno)
				<tr>
					<td>{{ $aluno->nome }}</td>
					<td>{{ $aluno->turma }}</td>
					<td>
						<a href="/aluno/{{ $aluno->id }}/edit" class="btn btn-warning">
							<i class="fas fa-edit"></i>
							Editar
						</a>
					</td>
					<td>
						<form method="POST" action="/aluno/{{ $aluno->id }}">
							<input type="hidden" name="_method" value="DELETE" />
							@csrf
							<button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir?');">
								<i class="fas fa-trash"></i>
								Excluir
							</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection