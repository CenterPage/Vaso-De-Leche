document.addEventListener('DOMContentLoaded', () => {

	if (document.querySelector('#dropzone')) {
		Dropzone.autoDiscover = false;

		const dropzone = new Dropzone('div#dropzone', {
			url: '/photos/store',
			dictDefaultMessage: 'Arrastra tus imagenes',
			maxFiles: 10,
			require: true,
			acceptedFiles: '.png, .jpg, .gif, .jpeg',
			addRemoveLinks: true,
			dictRemoveLinks: 'Elininar',
			headers: {
				'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
			},

			success: function(file, response) {
				// console.log(response);
				file.nameServer = response.archivo;
			},

			sending: function(file, xhr, formData) {
				formData.append('uuid', document.querySelector('#uuid').value);
				// console.log('xD');
			},

			removedfile: function(file, response) {
				// console.log(file);

				const params = {
					photo: file.nameServer
				}

				axios.post('/photos/destroy', params)
				 .then(response => {
				 	// console.log(response);

				 	// Eliminar del DOM
				 	file.previewElement.parentNode.removeChild(file.previewElement);
				 });
			}
		});
	}

});