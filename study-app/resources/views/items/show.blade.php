<div>
  @if ($item->item_img == "")
  {{-- <img src= "/upload/751391-3.png" width="100"> --}}
  @else 
  <img src= "/upload/{{ $item->item_img }}" width="100"> 
  @endif 
</div>
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