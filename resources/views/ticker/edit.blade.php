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
  <form method="POST" action="/ticker/1">
    @method('PUT')
    @csrf

    <div class="form-group row">
      <label for="nameFormInput" class="col-sm-2 col-form-label col-form-label-lg">@lang('ticker.name')</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="nameFormInput" placeholder="@lang('ticker.name')" name="name"
        value="{{$ticker->name}}">
      </div>
    </div>

    <div class="form-group row">
      <label for="esinFormInput" class="col-sm-2 col-form-label col-form-label-lg">@lang('ticker.esin')</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="esinFormInput" placeholder="@lang('ticker.esin')" name="esin"
        value="{{$ticker->esin}}">
      </div>
    </div>

    <div class="form-group row">
      <label for="gsFormInput" class="col-sm-2 col-form-label col-form-label-lg">@lang('ticker.google_symbol')</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="gsFormInput" placeholder="@lang('ticker.google_symbol')" name="google_symbol"
        value="{{$ticker->google_symbol}}">
      </div>
    </div>


    <div class="form-group row">
        <div class="col-md-12">
            <a href="/ticker" class="btn btn-primary">@lang('crud.back')</a>
            <input type="submit" class="btn btn-primary">
        </div>
    </div>

  </form>
</div>
@endsection

