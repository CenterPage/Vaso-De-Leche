<template>
	<div class="container my-5">
		<!-- <h2 class="text-center">Comité {{ stablishment.name }}</h2> -->
		<div class="row align-items-start">
			<div class="col-md-2"></div>
			<div class="col-md-4 order-2">
				<!-- <img class="mb-4" :src="`../storage/${stablishment.image}`" alt="" style="width: 400px;"> -->

				<h2 >INFORMACIÓN</h2>
				<span><strong class="text-secondary">Comité: </strong>{{ stablishment.name }}</span>
				<br>
				<span><strong class="text-secondary">Presidenta: </strong>{{ stablishment.name_presidenta }}</span>
				<br>
				<span><strong class="text-secondary">Beneficiados: </strong>{{ stablishment.num_beneficiado }}</span><br>
				<span><strong class="text-secondary">N. Resolución: </strong>{{ stablishment.num_resolucion }}</span><br>
				<span><strong class="text-secondary">Fecha Emitido: </strong>{{ stablishment.fecha_emitido }}</span><br>
				<span><strong class="text-secondary">Fecha Vencimiento: </strong>{{ stablishment.fecha_vencimiento }}</span><br>

				<p class="mt-5">{{ stablishment.description }}</p>

				<!-- <photo-stablishment></photo-stablishment> -->

			</div>
			<aside class="col-md-4 order-1">

                <div class="">
                    <mapa-location></mapa-location>
                </div>

				<div class="text-center text-white mt-2 mb-4 bg-primary p-2">
					<h4 class="text-white">MÁS INFORMACIÓN</h4>
					<p class="text-white m-0">
						<span class="font-weight-bold">Lugar:</span>
						{{ this.lugar }}
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
// import photoStablishment from './photoStablishment';
import { latLng } from 'leaflet';
import { LMap, LTileLayer, LMarker, LTooltip } from 'vue2-leaflet';

export default {
    data() {
        return {
            lugar: '',
            stablishmentes: {},
        }
    },
	components: {
		mapaLocation,
		// photoStablishment
    },
	methods: {
        IconStablishment() {
            return L.icon ({
                iconUrl: `https://unpkg.com/leaflet@1.7.1/dist/images/marker-icon.png`,
                iconSize: [20, 30]
            })
        },
		getStablishment() {
			const { id } = this.$route.params;
			// No olvides poner el "/" antes de cualquier URL porque sino coge todo el nombre de la otra URL
			axios.get('/api/stablishments/' + id)
				.then(response => {
					// console.log(response.data[0]);
					this.lugar = response.data[0].category.name;
					let establishmentes = response.data[0];
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

