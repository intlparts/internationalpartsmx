@extends('layouts.app')
@section('section__banner_right')
    <div class="w3l_banner_nav_right_banner3">
        <h3>Mejores piezas con los mejores creditos</h3>
    </div>
@endsection
@section('content')
    <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
        <div class="container">
        <h3>Proveedor {{$trade_name}}</h3>
            <div class="w3ls_w3l_banner_nav_right_grid1">
                @foreach ($piezas as $pieza)
                    <div class="col-md-3 w3ls_w3l_banner_left" style="margin-bottom: 10px;">
                        <div class="hover14 column">
                            <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                                <div class="agile_top_brand_left_grid1">
                                    <figure>
                                        <div class="snipcart-item block">
                                            <div class="snipcart-thumb">
                                                <a href="{{ route('pieza', ['number'=>  Str::of($pieza->number)->trim()]) }}">
                                                    <img src="{{ asset('images/team.jpg') }}" alt="" class="img-responsive">
                                                </a>
                                                <h4 style="font-size: 1.1rem; margin: 10px 0;">{{$pieza->number}}</h4>
                                                <p>{{$pieza->short_description}}</p>
                                                <a href="{{ route('pieza', ['number'=>  Str::of($pieza->number)->trim()]) }}" class="addToCart" style="margin-top: 5px;">ver pieza</a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>               
                @endforeach
                <div class="clearfix"> </div>
            </div>
            <div class="">
                {{ $piezas->links() }}
            </div>
        </div>
    </div>
@endsection
