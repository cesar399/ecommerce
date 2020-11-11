
@extends('template')

@section('content')

<div class=" text-center">
	<div class="row">
		<div class="col-md-11">
			<div class="button-group sort-by-button-group">
				<div class="dropdown float-right">
				  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Ordenar
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
				    <button class="dropdown-item" type="button"data-sort-value="number" data-sort-direction="asc" class="btn btn-secondary button" data-sort-by="number">De menor a mayor</button>
				    <button class="dropdown-item" type="button"data-sort-value="number" data-sort-direction="desc" class="btn btn-secondary">De mayor a menor</button>
				  </div>
				</div>
			</div>
		</div>

		<div class="col-md-2">
			<div class="card">
				{!!Form::open(['route' => 'home', 'method' => 'GET', 'class' => 'navbar-form  pull-right', 'role' => 'search'])!!}
				<div class="form-group card-body">
					<h2><span>Buscar</span></h2>
					{!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre Producto'])!!}
				</div>
				<div class="form-group card-body">
					<span>Rango de precio:</span>

					{!!Form::open(['route' => 'home', 'method' => 'GET', 'class' => 'navbar-form  pull-right', 'role' => 'search'])!!}
						<div class=" mb-2">
							{!!Form::text('min', null, ['class' => 'form-control', 'placeholder' => 'Monto minimo'])!!}
							{!!Form::text('max', null, ['class' => 'form-control', 'placeholder' => 'Monto maximo'])!!}
						</div>
						<button type="submit" class="btn btn-primary mb-2">Buscar</button>
					{{ Form::close() }}
				</div>
			</div>

		</div>
		<div class="col-md-9">
			<div id="product" >
				<div class="grid" >
					@foreach($products as $product)
						<div class=" white-panel element-item ">
							<h1>Hola</h1>
							<h3 class="name">{{$product->name}} </h3> <hr>
							  	@foreach($product->image as $image)
							    @endforeach

								<img src="{{Storage::url('/' . 'Gallery'. '/' . $image->url)}}" style="min-width: 1em; max-width: 5em;" >

							<div class="product-info panel">
								<p>{{$product->extract}} </p>
								<label hidden="hidden" class="number">{{$product->price}}</label>

								<h3 ><span   class=" badge badge-success ">${{number_format($product->price,2)}}</span></h3>
								<p>
									<a  class="btn btn-warning " href="{{route('cart-add', $product->id)}} "> Añadir <i class="fa fa-cart-plus fa-2x"></i></a>
									<a class="btn btn-primary" href="{{route('store.show', $product->id)}} "><i class="fa fa-chevron-circle-right"></i> Ver mas</a>
								</p>
							</div>
						</div>
					@endforeach

				</div>
				{{ $products->render()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection




