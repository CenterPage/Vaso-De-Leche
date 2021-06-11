<template>
	<div class="container my-5">
		<h2 class="text-center">Comite {{ stablishment.name }}</h2>
		<div class="row align-items-start">
			<div class="col-md-8 order-2">
				<img :src="`../storage/${stablishment.image}`" alt="" style="width: 400px;">

				<p><strong>{{ stablishment.name_presidenta }}</strong></p>

				<p class="mt-5">{{ stablishment.description }}</p>

				<photo-stablishment></photo-stablishment>

			</div>
			<aside class="col-md-4 order-1">
				<div class="">
					<mapa-location></mapa-location>
				</div>
				<div class="text-center text-white mt-2 mb-4 bg-primary p-2">
					<h4 class="text-white">Más información</h4>
					<p class="text-white m-0">
						<span class="font-weight-bold">Lugar:</span>
						{{ stablishment.category.name }}
					</p>
					<p class="text-white m-0">
						<span class="font-weight-bold">Ubicación:</span>
						{{ stablishment.address }}
					</p>
					<p class="text-white m-0">
						<span class="font-weight-bold">Mz / Lote:</span>
						{{ stablishment.mz_lote }}
					</p>
					<p class="text-white">
						<span class="font-weight-bold">Teléfono:</span>
						{{ stablishment.phone }}
					</p>
				</div>

			</aside>
		</div>
	</div>
</template>

<script>
import mapaLocation from './mapaLocation';
import photoStablishment from './photoStablishment';

export default {
	components: {
		mapaLocation,
		photoStablishment
	},
	methods: {
		getStablishment() {
			const { id } = this.$route.params;
			// No olvides poner el "/" antes de cualquier URL porque sino coge todo el nombre de la otra URL
			axios.get('/api/stablishments/' + id)
				.then(response => {
					console.log(response.data[0]);
					this.$store.commit('GET_STABLISHMENT', response.data[0]);
				})
                .catch(error => {
                    console.log(error)
                })
		}
	},
	mounted() {
		this.getStablishment();
	},
	computed: {
		stablishment() {
			return this.$store.getters.getStablishment;
		}
	}
}
</script>
