@extends('layouts.app')
@section('section__banner_right')
<div class="agileinfo_single">
    <div class="col-md-4 agileinfo_single_left">
        <!-- <img src="{{ asset('images/team.jpg') }}" alt="{{$pieza->number}}" class="img-responsive"> -->
        <img src="{{ asset('images/sinimagen.jpg') }}" alt="" class="img-responsive">
    </div>
    <div class="col-md-8 agileinfo_single_right">
        <div class="d-flex">
            <strong>Número de parte:</strong>
            <h5> {{$pieza->number}}</h5>
        </div>
        <div class="w3agile_description">
            <h4>Description :</h4>
            <p>{{$pieza->large_description}}</p>
        </div>
        <div class="snipcart-item block">
            <a href="{{ route('contacto') }}" class="addToCart" style="padding: 10px;">Solicitar Cotización</a>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
@endsection

