@extends('layouts.app')
@section('content')
<h1>hello World</h1>
<a href="{{ url('item/create') }}" >投稿</a>
<h2>投稿されたもの</h2>
@foreach($items as $item)
<div>{{ $item->name }}</div>
<div>{{ $item->url }}</div>
<div>{{ $item->text }}</div>
@endforeach
@endsection
