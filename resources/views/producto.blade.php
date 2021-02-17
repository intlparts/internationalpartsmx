@extends('layouts.app')
@section('section__banner_right')
<div class="agileinfo_single">
    @if (\Session::has('mensaje'))
    <div class="alert alert-{{\Session::get('class')}} alert-dismissible fade show" role="alert" style="font-size: 1rem; opacity:1;">
        {!! \Session::get('mensaje') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>                 
    @endif
    <div class="col-md-4 agileinfo_single_left">
        <!-- <img src="{{ asset('images/team.jpg') }}" alt="{{$pieza->number}}" class="img-responsive"> -->
        <img src="{{ asset('images/sinimagen.jpg') }}" alt="" class="img-responsive">
    </div>
    <div class="col-md-8 agileinfo_single_right">
        <div class="" style="display: flex; align-items: baseline;">
            <strong>Número de parte:</strong>
            <h5 style="margin-left: 10px; margin-bottom: 0px;">{{$pieza->number}}</h5>
        </div>
        <div class="w3agile_description">
            <h4>Description :</h4>
            <p>{{$pieza->large_description}}</p>
        </div>
        <div class="snipcart-item block">
            <form action="{{ route('contacto-producto') }}" method="post" class="product__options mt-3 row">
                @csrf
                <div class="form-group col-sm-12 col-md-6">
                    <input type="text" name="nombre" placeholder="Nombre" class="form-control">
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <input type="email" name="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <input type="text" name="telefono" placeholder="Teléfono" class="form-control">
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <input type="text" name="fabricante" placeholder="Fabricante" class="form-control" value="{{{$pieza->name}}}">
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <input type="text" name="n_parte" placeholder="Nro de Parte" class="form-control" value="{{$pieza->number}}">
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <input type="number" name="cantidad" placeholder="Cantidad" class="form-control">
                </div>
                <div class="form-group product__option col-sm-12">
                    <div class="product__actions">
                        <div class="product__actions-item product__actions-item--addtocart w-100">
                            <button type="submit" class="btn btn-warning btn-lg w-100">Contactar</button>
                        </div>
                    </div>
                </div>
            </form><!-- .product__options / end -->
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
@endsection

