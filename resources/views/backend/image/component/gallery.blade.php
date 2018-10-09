<section class="section">
  <div class="grid">
    @foreach($images as $image)
    <div class="item item--medium @foreach($select as $val) @if($val == $image->img_id) selected @endif  @endforeach " style="background: url({{ asset('/storage/upload/images/'.$image->img_name)  }}); background-size: cover; background-position: center; " data-attr="{{ $image }}">
      <div class="item__details">
        {{ $image->img_name }}
      </div>
    </div>
    @endforeach
  </div>
</section>