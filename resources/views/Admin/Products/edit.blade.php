@extends('template')

@section('title', 'Agregar Producto')

@section('content')
	<div class="container text-center">
		<div class="page-header">
			<h1>
				<i class="fa fa-shopping-cart"></i>
				Categorias <small> Editar</small>
			</h1>
		</div>

	{!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data', 'class' => 'bg-white py-3 px-4S shadow rounded']) !!}
	@include('admin.products.form')
	<div class="form-group text-center">
	{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
		<a class="btn btn-warning" href="{{ route('products.index') }}">Cancelar</a>
	</div>
	{!! Form::close() !!}
</form>
	</div>
@endsection

