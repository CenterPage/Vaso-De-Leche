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

			// Para mostrar las imagenes en la vista edit
			init: function () {
				const galery = document.querySelectorAll('.galery');

				if (galery.length > 0) {
					galery.forEach(image => {
						const imagePublished = {};
						imagePublished.size = 1;
						imagePublished.name = image.value;
						imagePublished.nameServer = image.value;

						this.options.addedfile.call(this, imagePublished);
						this.options.thumbnail.call(this, imagePublished, `/storage/${imagePublished.name}`);

						imagePublished.previewElement.classList.add('dz-success');
						imagePublished.previewElement.classList.add('dz-complete');
					})
				}
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
					photo: file.nameServer,
					uuid: document.querySelector('#uuid').value // Para que el Policy funcione
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