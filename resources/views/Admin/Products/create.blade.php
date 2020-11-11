@extends('template')

@section('title', 'Agregar Producto')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header text-center"><h1>
                <i class="fa fa-shopping-cart"></i>
                Agregar productos
            </h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['route' => 'products.store', 'enctype' => 'multipart/form-data', 'class' => 'bg-white py-3 px-4S ']) !!}
                        @include('admin.products.form')
                        <div class="form-group text-center">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                            <a class="btn btn-warning" href="{{ route('products.index') }}">Cancelar</a>
                        </div>
                    {!! Form::close() !!}
                   <!-- <form method="POST" action="{ {route('products.store')}} " enctype="multipart/form-data" >
                    	@ csrf
						@ include('admin.products.form', ['btnText' => 'Guardar'])
                        @ csrf-->


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</form>
@endsection