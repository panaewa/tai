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
  <form method="POST" action="/{{ $slug }}/{{ $obj->id }}">
    @method('PUT')
    @csrf

    @foreach($columns as $col)
    <div class="form-group row">
      <label for="{{ $col }}FormInput" class="col-sm-2 col-form-label col-form-label-lg">@lang($slug.'.'.$col)</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="{{ $col }}FormInput" placeholder="@lang($slug.'.'.$col)" name="{{ $col }}"
        value="{{ $obj->$col }}">
      </div>
    </div>
    @endforeach

    <div class="form-group row">
        <div class="col-md-12">
            <a href="/ticker" class="btn btn-primary">@lang('crud.back')</a>
            <input type="submit" class="btn btn-primary" value="@lang('crud.send')">
        </div>
    </div>

  </form>
</div>
@endsection

