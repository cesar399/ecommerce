@extends('admin.template')

@section('content')
	<div class="container text-center">
		<div class="page-header">
			<h1>
				<i class="fa fa-shopping-cart"></i>
				Productos <a href="{{route('products.create')}} " class="btn btn-warning"> <i class="fa fa-plus-circle"></i> Producto</a>
			</h1>
		</div>
		<div class="page">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Imagen</th>
							<th>Descripción</th>
							<th>Precio</th>
							<th>Editar</th>
							<th>Elminiar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
							<tr>

								<td>{{$product->name}} </td>

								<td>
                                    @foreach($product->image as $image)
                                        <span><img width="50px" src=" {{Storage::url('/' . 'Gallery'. '/' . $image->url)}}"></span>
                                    @endforeach
                                </td>
								<td>{{$product->description}} </td>
								<td>${{ number_format($product->price,2)}} </td>
								<td><a href="{{route('products.edit', $product->id)}} " class="btn btn-primary"> <i class="fa fa-pencil-square"></i></a></td>
								<td>
									{!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE'])!!}
										<button onclick="return confirm('Eliminar registro?')" class="btn btn-danger">
										 <i class="fa fa-trash-o"></i>
										 </button>
									{!! Form::close()!!}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<hr>
			{{ $products->render()}}
		</div>
	</div>

@endsection