<template>
	<div class="container my-5">
		<h2 class="text-center">{{ stablishment.name }}</h2>
		<div class="row align-items-start">
			<div class="col-md-8">
				<img :src="`../storage/${stablishment.image}`" alt="" style="width: 400px;">
				<p class="mt-5">{{ stablishment.description }}</p>
			</div>
			<aside class="col-md-4 bg-primary">
				<div class=""></div>
				<div class="text-center text-white mt-2 mb-4">
					Más información
				</div>
				<p class="text-white mt-1">
					<span class="font-weight-bold">Ubicación</span>
					{{ stablishment.address }}
				</p>
				<p class="text-white mt-1">
					<span class="font-weight-bold">Horario</span>
					{{ stablishment.open }} - {{ stablishment.close }}
				</p>
				<p class="text-white mt-1">
					<span class="font-weight-bold">Telefono</span>
					{{ stablishment.phone }}
				</p>
			</aside>
		</div>
	</div>
</template>

<script>
	export default {
		methods: {
			getStablishment() {
				const { id } = this.$route.params;
				// No olvides poner el "/" antes de cualquier URL porque sino coge todo el nombre de la otra URL
				axios.get('/api/stablishments/' + id)
					.then(response => {
						this.$store.commit('GET_STABLISHMENT', response.data);
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