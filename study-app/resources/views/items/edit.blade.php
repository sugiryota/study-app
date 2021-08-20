@extends('layouts.app')
@section('content')
  <div class="card-body">
    
    

    @include('common.errors')

    <form   action="{{ route('item.update' ,$item->id) }}" enctype="multipart/form-data" method="POST"
    class="form-horizontal">
      @csrf
      @method('PUT')
      <div class="form-group">
        <div class="card-title">
          題目
        </div>
        <div class="col-sm-6">
          <input type="text" name="name" value="{{ $item->name }}" class="form-control">
        </div>
        <div class="card-title">
          URL
        </div>
        <div class="col-sm-6">
          <input type="integer" name="url" value="{{ $item->url }}" class="form-control">
        </div>
        <div class="card-title">
          text
        </div>
        <div class="col-sm-6">
          <input type="text" name="text" value="{{ $item->text }}" class="form-control">
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