@extends('layouts.app')
@section('content')
<h1>hello World</h1>
<a href="{{ url('item/create') }}" >投稿</a>
<h2>投稿されたもの</h2>
@foreach($items as $item)
<a href="{{ action('ItemsController@show', $item->id) }}">
<div>{{ $item->name }}</div>
</a>
@endforeach
<div class="row">
  <div class="col-md-4 offset-md-4">
    {{ $items->links('pagination::bootstrap-4') }}
  </div>
</div>
@endsection
