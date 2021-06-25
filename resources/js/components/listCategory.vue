<template>
	<div class="container mt-4">
		<nav class="d-flex flex-column justify-content-center">
            <div>
                <h4>Filtrar comites por sector</h4>
            </div>
            <div style="width:100%;margin:20px auto;height:75px;">
                <slider ref="slider" :options="options" >
                    <div data-v-4ec34587="" class="slider-item" style="background-color: red; width: 23.5%; margin-right: 1%; border-radius: 5px;">
                        <h5 class="cursor" @click="selectAll" href="#">Mostrar Todo</h5>
                    </div>
                    <!-- slideritem wrapped package with the components you need -->
                    <slideritem v-for="(item,index) in allCategories" :key="index" style="background-color: red; width: 23.5%; margin-right: 1%; border-radius: 5px">
                        <h5 class="cursor" @click="selectCategory(item)">{{item.name}}</h5>
                    </slideritem>
                    <!-- Customizable loading -->
                    <div slot="loading">loading...</div>
                </slider>
            </div>
		</nav>
	</div>
</template>

<script>
import { slider, slideritem } from 'vue-concise-slider'
export default {
    data() {
        return {
            options: {
                currentPage: 0,
                tracking: false,
                thresholdDistance: 100,
                thresholdTime: 300,
                infinite: 4,
                slidesToScroll: 4,
                loop: true
            }
        }
    },
    components: {
        slider,
        slideritem
    },
	created() {
		axios.get('/api/categories')
		    .then(response => {
		    	this.$store.commit('GET_CATEGORIES', response.data);
		    })
	},
	computed: {
		allCategories() {
			return this.$store.getters.getAllCategories;
		}
	},
	methods: {
		selectCategory(category) {
			this.$store.commit('SELECT_CATEGORY', category.slug);
			console.log(category.slug);
		},
		selectAll() {
			axios.get('/api/stablishments')
				.then(response => {
					this.$store.commit('GET_ALL_STABLISHMENT', response.data);
				})
	            .catch(error => {
	                console.log(error)
	            })
		}
	}
}
</script>

<style scoped>
.slider-item {
    font-size: 15px !important;
}
.cursor {
    cursor: pointer;
    color: white !important;
}
nav a {
    color: white !important;
    font-weight: bold;
    text-transform: uppercase;
    padding: 0.5rem 2rem;
    text-align: center;
    flex: 1;
    /*background-color: rgba(209, 213, 219, .6);*/
    border-radius: 4px;
    margin-left: 2px;
    margin-right: 2px;
}
nav a:hover {
    color: white;
    cursor: pointer;
}
/*nav a:nth-child(1) {
  background-color: #a011b7;
}
nav a:nth-child(2) {
  background-color: #591d03;
}
nav a:nth-child(3) {
  background-color: #ea6a00;
}
nav a:nth-child(4) {
  background-color: #edb220;
}
nav a:nth-child(5) {
  background-color: #dd0e3f;
}
nav a:nth-child(6) {
  background-color: #0448b5;
}
nav a:nth-child(7) {
  background-color: #00a81c;
}*/
</style>
