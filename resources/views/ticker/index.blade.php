@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $title }} List <a href="/{{ $slug }}/create" class="btn btn-primary float-right">@lang('crud.create')</a></div>

                <div class="card-body">
                <br />
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br />
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                @foreach($columns as $col)
                                <th>@lang($slug.'.'.$col)</th>
                                 @endforeach        
                                <th style="min-width: 100px">@lang('crud.actions')</th>                    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $obj)
                            <tr>
                                @foreach($columns as $col)
                                <td>{{ $obj->$col }}</td>
                                @endforeach     
                                <td>
                                    <a href="/{{ $slug }}/{{ $obj->id }}" class="btn btn-primary">@lang('crud.show')</a>
                                    <a href="/{{ $slug }}/{{ $obj->id }}/edit" class="btn btn-primary">@lang('crud.edit')</a>
                                    <form method="POST" action="/{{ $slug }}/{{ $obj->id }}" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">@lang('crud.destroy')</button>
                                    </form>
                                </td>
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