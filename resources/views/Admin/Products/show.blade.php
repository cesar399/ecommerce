@extends('template')

@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1><i class="fa fa-shopping-cart"></i> Detalles del producto</h1>
    </div>
    <div class="row">
            <div class="col-md-6">
                <div class="product-block">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="{ {Storage::url('/' . 'Gallery'. ' /' .$products->image->shift()->url)}}" class="d-block w-100" alt="..." style="min-width: 515px; max-width: 516px; min-height: 479px; max-height: 480px;">
                        </div>
                        @ forelse($products->image as $image)
                        <div class="carousel-item">
                          <img src="{ {Storage::url('/' . 'Gallery'. ' /' .$image->url)}}" class="d-block w-100" class="d-block w-100" alt="..." style="min-width: 515px; max-width: 516px;  min-height: 479px; max-height: 480px;">
                        </div>
                        @ empty
                        <em>No hay imagenes</em>


                        @ endforelse

                      </div>

                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                </div>
            </div>

        <div class="col-md-6">

            <div class="product-block">
                <h3>{{$products->name}} </h3><hr>
                <div class="product-info panel">
                    <p>{{$products->description}} </p>
                    <h3><span class="badge badge-success">Precio: ${{number_format($products->price,2)}} </span></h3>
                    <p>
                        <a  class="btn btn-warning btn-block" href="{{route('cart-add', $products->id)}} "> Añadir <i class="fa fa-cart-plus fa-2x"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
        <hr>
    <p> <a class="btn btn-primary" href="{{route('home')}} "><i class="fa fa-chevron-circle-left"> Regresar </i></a></p>
</div>
@endsection