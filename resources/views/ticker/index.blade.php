@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tickers List</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>@lang('ticker.name')</th>
                                <th>@lang('ticker.esin')</th>
                                <th>@lang('ticker.google_symbol')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickers as $ticker)
                            <tr>
                                <td>{{ $ticker->name }}</td>
                                <td>{{ $ticker->esin }}</td>
                                <td>{{ $ticker->google_symbol }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection