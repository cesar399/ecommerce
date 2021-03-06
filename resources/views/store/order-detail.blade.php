@extends('template')

@section('content')

<div class="container text-center">
	<div class="page-header">
		<h1><i class="fa fa-shopping-cart"></i> Detalle del pedido</h1>
	</div>
	<div class="page table-cart">
		<div class="table-responsive">
			<h3>Datos del Usuario</h3>
			<table class="table table-stiped table-hover table-bordered">
				<tr><td>Nombre:</td><td> {{Auth::user()->name . " " . Auth::user()->last_name}}</td></tr>
				<tr><td>Email:</td><td> {{Auth::user()->email }}</td></tr>
				<tr><td>Nombre:</td><td> {{Auth::user()->address}}</td></tr>
			</table>
		</div>
		<div class="table-responsive">
			<h3>Datos del Pedido</h3>
			<table class="table table-stiped table-hover table-bordered">
				<tr>
					<th>Producto</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Subtotal</th>
				</tr>
				@foreach($cart as $item)
				<tr>
					<td>{{$item->name}}</td>
					<td>${{ number_format($item->price,2)}} </td>
					<td>{{$item->quantity}}</td>
					<td>${{ number_format($item->price * $item->quantity,2)}} </td>
				</tr>
				@endforeach
			</table><hr>
			<h3>
				<span class="badge badge-success">
					Total: ${{ number_format($total, 2)}}
				</span>
			</h3>
			<p>
				<a href="{{route('cart-show')}} " class="btn btn-primary">
					<i class="fa fa-chevron-circle-left"></i> Regresar
				</a>
				<a href="{{route('cart-show')}} " class="btn btn-primary">
					Pagar con <i class="fa fa-paypal fa-2x"></i>
				</a>
			</p>
		</div>
	</div>
</div>
@endsection