@extends('template')

@section('content')
<div class="container text-center">
	<div class="page-header">
		<h1><i class="fa fa-shopping-cart"></i> Carrito de compras</h1>
	</div>
	<hr>
	<div class="table-cart">
		@if(count($cart))
		<p>
			<a class="btn btn-danger" href="{{route('cart-trash')}} ">
				Vaciar carrito <i class="fa fa-trash"></i>
			</a>
		</p>
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>Imangen</th>
						<th>Producto</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
						<th>Quitar</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cart as $item)
					<tr>
						<td>
							@forelse($item->image as $image)
								<img src="{{Storage::url('/' . 'Gallery'. ' /' .$image->url)}}">
							@empty
							<em>/</em>
							@endforelse
						</td>
						<td>{{$item->name}} </td>
						<td>${{number_format($item->price,2)}} </td>
						<td>
						<input
						type="number"
						min="1"
						max="100"
						value="{{$item->quantity}}"
						id="product_{{$item->id}}">
						<a
						href="#"
						class="btn btn-warning btn-update-item"
						data-href="{{route('cart-update', $item->id)}}"
						data-id="{{$item->id}}">
							<i class="fa fa-refresh"></i>
						</a>
					</td>
						<td>${{ number_format($item->price * $item->quantity, 2)}} </td>
						<td>
							<a href=" { {route('cart-delete', $item->slug)}} " class="btn btn-danger">
								<i class="fa fa-remove"></i>
							</a>
						</td>

					</tr>
					@endforeach
				</tbody>
			</table><hr>
			<h3>
				<span class="badge badge-success">
					Total: ${{number_format($total,2)}}
				</span>
			</h3>
		</div>
		@else
			<h3><span class="badge badge-danger"> No hay elementos</span></h3>
		@endif
		<hr>
		<p>
			<a class="btn btn-primary" href="{{route('home')}}">
				<i class="fa fa-chevron-circle-left"></i> Seguir comprando
			</a>

			<a class="btn btn-primary" href="{{route('order-detail')}}">
				Continuar <i class="fa fa-chevron-circle-right"></i>
			</a>
		</p>
	</div>
</div>
@endsection