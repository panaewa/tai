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
            <a href="{{ $obj->url }}" target="_blank">{{ $quote->getLongName() }}</a>
        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">@lang($slug.'.link_title')</div>

                <div class="card-body">
                    <a href="http://www.bmerv.es/esp/aspx/Empresas/FichaValor.aspx?ISIN={{ $obj->esin }}">BME Renta Variable</a>
                    <br>
                    <a href="https://www.tradingview.com/chart/?symbol={{ $obj->google_symbol }}">Tradingview</a>  
                    <br>
                    <a href="https://finance.yahoo.com/chart/{{ $obj->yahoo_symbol }}">Yahoo Chart</a> 
                </div>
            </div>        
        </div>

        <div class="col-sm-9">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">                    
                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">D</a>
                    <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Resumen</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">T</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div id="chart_div" style="width: 100%; height: 500px;"></div>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        @foreach( $historicalData as $h)
                        ['{{ $h->getDate()->format("j-M-y")}}', {{ $h->getLow() }}, {{ $h->getOpen() }}, {{ $h->getClose()}}, {{ $h->getHigh()}}],
                        @endforeach
                        // Treat first row as data as well.
                        ], true);

                        var options = {
                        legend:'none'
                        };

                        var chart = new google.visualization.CandlestickChart(document.getElementById('chart_div'));

                        chart.draw(data, options);
                    }
                    </script>
                </div>
                <div class="tab-pane fade show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quote->jsonSerialize() as $key => $value)
                            <tr>
                                <th scope="row">@lang($slug.'.'.$key)</th>
                                @if (is_object($value))
                                <td>{{ $value->format('Y-m-d H:i') }}</td>
                                @else
                                <td>{{ $value }}</td>                          
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">bbbb</div>
            </div>      
        </div>
    </div>

    

    <hr/>

    <div class="row">
        <div class="col-md-12">
            <a href="/{{$slug}}" class="btn btn-primary">@lang('crud.back')</a>
            <a href="/{{$slug}}/{{ $obj->id }}/edit" class="btn btn-primary">@lang('crud.edit')</a>
        </div>
    </div> 

</div>
@endsection
