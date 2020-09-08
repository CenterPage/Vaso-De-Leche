document.addEventListener('DOMContentLoaded', () => {

	if (document.querySelector('#dropzone')) {
		Dropzone.autoDiscover = false;

		const dropzone = new Dropzone('div#dropzone', {
			url: '/photos/store',
			dictDefaultMessage: 'Arrastra tus imagenes',
			maxFiles: 10,
			require: true,
			acceptedFiles: '.png, .jpg, .gif, .jpeg',
			headers: {
				'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
			},

			success: function(file, response) {
				console.log(response);
			},

			sending: function(file, xhr, formData) {
				formData.append('uuid', document.querySelector('#uuid').value);
				// console.log('xD');
			}
		});
	}

});