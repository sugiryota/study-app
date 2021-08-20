<div>{{ $item->name }}</div>
<div>{{ $item->url }}</div>
<div>{{ $item->text }}</div>
<form action="{{ url('item/'.$item->id) }}" method="post">
  @csrf
  @method('DELETE')
  <button type="submit" class="btn item-destroy">
    削除
  </button>
</form>
<a href="{{ action('ItemsController@edit', $item->id) }}">編集</a>