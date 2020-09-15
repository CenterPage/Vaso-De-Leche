<template>
	<!-- <div class=""> -->
		<!-- <h1>Photos</h1> -->
		<!-- <div class="" v-for="(index, photo) in imagenes" :key="index"> -->
			<!-- <img :src="photo.id" alt=""> -->
			<!-- <p>{{ photo.id }}</p> -->
		<!-- </div> -->
	<!-- </div> -->
    <div>
        <h2 class="mt-4">Galería de Imágenes</h2>

        <ul class="row list-unstyled mt-4">
            <li class="col-md-4 mb-4" v-for="imagen in imagenes" v-bind:key="imagen.id">
                <a :href='`/storage/${imagen.url}`' data-lightbox="imagenes" data-title="Imagen Establecimiento">
                    <img class="img-fluid" :src='`/storage/${imagen.url}`'>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
import Lightbox from 'lightbox2';

export default {
	computed: {
		imagenes() {
			return this.$store.getters.getPhotoStablishment;
		}
	}
}
</script>

<style scoped>
    @import 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css';
</style>