<div class="modal-body">
	<div class="dropzone" id="dropzone" name="myDropzone"></div>
</div>
<script>
	var myDropzone = new Dropzone("#dropzone", {
		url: '{{ route( 'upload' ) }}',
		headers: {
			'X-CSRF-TOKEN': '{!! csrf_token() !!}'
		},
		autoProcessQueue: true,
		uploadMultiple: true,
		parallelUploads: 5,
		maxFilesize: 5,
		acceptedFiles: ".jpeg,.jpg,.png,.gif",
		dictFileTooBig: 'Image is bigger than 5MB',
		addRemoveLinks: false,
		previewsContainer: null,
		init: function(){
			this.on('error', function(file, mes, data){
				
			})
		}
	});
	
</script>