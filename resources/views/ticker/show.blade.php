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
        <div class="col-sm-10">
            {{$ticker->name}}"
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Enlaces
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="http://www.bmerv.es/esp/aspx/Empresas/FichaValor.aspx?ISIN={{$ticker->esin}}">BME Renta Variable</a>
                    <a class="dropdown-item" href="https://www.tradingview.com/chart/?symbol={{$ticker->google_symbol}}">Tradingview</a>   
                </div>
            </div>    
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="/ticker" class="btn btn-primary" target="_blank">@lang('crud.back')</a>
            <a href="/ticker/{{ $ticker->id }}/edit" class="btn btn-primary" target="_blank">@lang('crud.edit')</a>
        </div>
    </div>

</div>
@endsection
