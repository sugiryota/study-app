@extends('layouts.app')
@section('content')
  <div class="card-body">
    
    

    @include('common.errors')

    <form  enctype="multipart/form-data" action="{{ url('item') }}" method="POST"
    class="form-horizontal">
      @csrf

      <div class="form-group">
        <div class="card-title">
          題目
        </div>
        <div class="col-sm-6">
          <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        </div>
        <div class="card-title">
          URL
        </div>
        <div class="col-sm-6">
          <input type="integer" name="url" value="{{ old('url') }}" class="form-control">
        </div>
        <div class="card-title">
          text
        </div>
        <div class="col-sm-6">
          <input type="text" name="text" value="{{ old('text') }}" class="form-control">
        </div>

      <div class="form-group">
        <div class="col-sm-offset-3 col-list">
          <button type="submit" class="btn btn-primary">
            Save
          </button>
        </div>
      </div>
      

    </form>
  </div>
  


@endsection