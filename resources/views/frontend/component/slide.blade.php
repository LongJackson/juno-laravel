<ul id="lightSlider">
@foreach($product->gallery as $img)
<li data-thumb="{{ asset("/storage/upload/images/".$img->img_name)}}">
    <img src="{{ asset("/storage/upload/images/".$img->img_name)}}" />
</li>
@endforeach
</ul>
<script>
	$(document).ready(function(){
		$('#lightSlider').lightSlider({
		        gallery:true,
		        item:1,
		        loop:true,
		        thumbItem:9,
		        slideMargin:0,
		        enableDrag: false,
		        currentPagerPosition:'left'
		    }); 
	});
</script>