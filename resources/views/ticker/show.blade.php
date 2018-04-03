@extends('layouts.admin')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ $obj->url }}" target="_blank">{{ $obj->name }}"</a>
        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">@lang('ticker.link_title')</div>

                <div class="card-body">
                    <a href="http://www.bmerv.es/esp/aspx/Empresas/FichaValor.aspx?ISIN={{$obj->esin}}">BME Renta Variable</a>
                    <br>
                    <a href="https://www.tradingview.com/chart/?symbol={{$obj->google_symbol}}">Tradingview</a>  
                </div>
            </div>        
        </div>

        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">@lang('ticker.link_title')</div>

                <div class="card-body">
                <div><a id="widgetIFB" href="http://www.infobolsa.es/cotizacion/TELEFONICA">Cotización TELEFONICA</a>
                <script type="text/javascript" src="http://www.infobolsa.es/widgets/instrumentDetail/TELEFONICA"></script></div>
                </div>
            </div>        
        </div>
    </div>

    

    <hr/>

    <div class="row">
        <div class="col-md-12">
            <a href="/ticker" class="btn btn-primary">@lang('crud.back')</a>
            <a href="/ticker/{{ $obj->id }}/edit" class="btn btn-primary">@lang('crud.edit')</a>
        </div>
    </div>

</div>
@endsection
