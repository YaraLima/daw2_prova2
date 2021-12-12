@extends("template/web")

@section("titulo", "Cadastro de Turmas")

@section("formulario")
	<h3>Cadastro de Turmas</h3>
	<form method="POST" action="/turma" class="row">
		
		@csrf
		<input type="hidden" name="id" value="{{ $turma->id }}" />
	
		<div class="form-group col-8">
			<label for="n_turma">Turma: </label>
			<input type="text" name="n_turma" class="form-control" value="{{ $turma->n_turma }}" required  />
		</div>
		
		<div class="form-group col-8">
			<label for="n_curso">Curso: </label>
			<input type="text" name="n_curso" class="form-control" value="{{ $turma->n_curso }}" required />
		</div>
		
		
		<div class="form-group col-4">
			<a href="/turma" class="btn btn-primary bottom">
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
	<h3>Listagem de Turmas</h3>
	<table class="table table-striped">
		<colgroup>
			<col width="200">
			<col width="200">
			<col width="80">
			<col width="80">
		</colgroup>
		<thead>
			<tr>
				<th>Turma</th>
				<th>Curso</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($turmas as $turma)
				<tr>
					<td>{{ $turma->n_turma}}</td>
					<td>{{ $turma->n_curso }}</td>
					
					<td>
						<a href="/turma/{{ $turma->id }}/edit" class="btn btn-warning">
							<i class="fas fa-edit"></i>
							Editar
						</a>
					</td>
					<td>
						<form method="POST" action="/turma/{{ $turma->id }}">
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

