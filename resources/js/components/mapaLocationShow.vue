<template>
    <div class="mapa">
        <l-map :zoom="zoom" :center="center" :options="mapOptions">
            <l-tile-layer :url="url" :attribution="attribution" />
            <l-marker :lat-lng="{lat, lng}" :icon="IconStablishment()">
                <l-tooltip>
                    {{ stablishment.name }}
                </l-tooltip>
            </l-marker>
        </l-map>
    </div>
</template>

<script>
import { latLng } from 'leaflet';
import { LMap, LTileLayer, LMarker, LTooltip } from 'vue2-leaflet';

export default {
    components: {
        LMap,
        LTileLayer,
        LMarker,
        LTooltip,
    },
    props: ['stablishment'],
    data() {
        return {
            zoom: 16,
            center: latLng(20.666332695977, -103.392177745699),
            url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
            currentZoom: 11.5,
            mapOptions: {
            zoomSnap: 0.5
            },
            showMap: true,
            lat: "",
            lng: ""
        }
    },
    methods: {
        IconStablishment() {
            return L.icon ({
                iconUrl: `https://unpkg.com/leaflet@1.7.1/dist/images/marker-icon.png`,
                iconSize: [20, 30]
            })
        },
    },
    created() {
        // console.log(this.stablishment);
        setTimeout(() => {
            this.lat = this.stablishment.latitud;
            this.lng = this.stablishment.longitud;
            this.center = latLng(this.lat, this.lng);
        }, 300);
    }
}
</script>

<style scoped="">
    @import 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css';

    .mapa {
        height: 300px;
        width: 100%;
    }
</style>
