<template>
	<div class="mapa">
		<l-map :zoom="zoom" :center="center" :options="mapOptions">
			<l-tile-layer :url="url" :attribution="attribution" />

			<l-marker 
				v-for="stablishment in AllStablishments"
				:key="stablishment.id"
				:lat-lng="getCordenadas(stablishment)"
				:icon="IconStablishment(stablishment)"
			>
				<l-tooltip>
					<div>
						{{ stablishment.name }} - {{ stablishment.category.name }}
					</div>
				</l-tooltip>
			</l-marker>
		</l-map>
	</div>
</template>

<script>
import { latLng } from 'leaflet';
import { LMap, LTileLayer, LMarker, LTooltip, LIcon } from 'vue2-leaflet';

export default {
	components: {
		LMap,
		LTileLayer,
		LMarker,
		LTooltip,
		LIcon
	},
	data() {
	    return {
	      zoom: 13,
	      center: latLng(-5.1995471, -80.6227001),
	      url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
	      attribution:
	        '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
	      currentZoom: 11.5,
	      currentCenter: latLng(20.666332695977, -103.392177745699),
	      showParagraph: false,
	      mapOptions: {
	        zoomSnap: 0.5
	      },
	      showMap: true
	    }
	},
	created() {
		axios.get('/api/stablishments')
			.then(response => {
				this.$store.commit('GET_ALL_STABLISHMENT', response.data);
			})
            .catch(error => {
                console.log(error)
            })
	},
	computed: {
		AllStablishments() {
			return this.$store.getters.getAllStablishment;
		}
	},
	methods: {
		getCordenadas(stablishment) {
			// console.log(stablishment)
			return {
				lat: stablishment.latitud,
				lng: stablishment.longitud
			}
		},
		IconStablishment(stablishment) {
			// console.log(stablishment)
			const { slug } = stablishment.category;
			return L.icon ({
				iconUrl: `img/iconos/${slug}.png`,
				iconSize: [40, 50]
			})
		}
	},
}
</script>

<style scoped="">
.mapa {
	height: 70vh;
	width: 100% !import;
}
</style>
