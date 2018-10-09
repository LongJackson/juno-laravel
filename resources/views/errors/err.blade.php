<script>
@if(isset($errors))
	@foreach($errors->all() as $err)
		new PNotify({
		    title: 'Lỗi!',
		    text: '{{ $err }}',
		    type: 'error'
		});
	@endforeach
@endif
@if(session('success'))
	new PNotify({
		    title: 'Thành công!',
		    text: '{{ session('success') }}',
		    type: 'success'
		});


@endif
@if(session('error'))
	new PNotify({
		    title: 'Lỗi!',
		    text: '{{ session('error') }}',
		    type: 'error'
		});


@endif
</script>