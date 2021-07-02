<template>
	<div class="container mt-4 mb-4">
		<nav class="d-flex flex-column justify-content-center">
            <div class="d-flex justify-content-center flex-column align-items-center mb-3">
                <h4>Filtrar comités por sector</h4>
                <input class="form-control col-md-4" type="text" v-model="search" placeholder="Ejemplo: A.H. El Indio">
            </div>
            <div class="d-flex justify-content-center flex-wrap">
<!--                 <slider ref="slider" :options="options" >
                    <div data-v-4ec34587="" class="slider-item" style="background-color: red; width: 23.5%; margin-right: 1%; border-radius: 5px;">
                        <h5 class="cursor" @click="selectAll" href="#">Mostrar Todo</h5>
                    </div>

                    <slideritem v-for="(item,index) in allCategories" :key="index" style="background-color: red; width: 23.5%; margin-right: 1%; border-radius: 5px">
                        <h5 class="cursor" @click="selectCategory(item)">{{item.name}}</h5>
                    </slideritem>

                    <div slot="loading">loading...</div>
                </slider> -->
                <div class="form-check form-check-inline border p-2 mt-1">
                    <input class="form-check-input cursor" type="radio" name="exampleRadios" id="exampleRadios1" value="option2" checked @click="selectAll">
                    <label class="form-check-label text-secondary cursor deed" for="exampleRadios1">
                        Todos
                    </label>
                </div>

                <div class="form-check form-check-inline p-2 border mt-1" v-for="(item,index) in filteredPacks" :key="index">
                    <input class="form-check-input cursor" type="radio" name="exampleRadios" :id="index" value="option1" @click="selectCategory(item)">
                    <label class="form-check-label text-secondary cursor deed" :for="index">
                        {{item.name}}
                    </label>
                </div>
            </div>

		</nav>
	</div>
</template>

<script>
// import { slider, slideritem } from 'vue-concise-slider'

export default {
    data() {
        return {
            search: '',
            options: {
                // currentPage: 0,
                // tracking: false,
                // thresholdDistance: 100,
                // thresholdTime: 300,
                // infinite: 4,
                // slidesToScroll: 4,
                // loop: true,
                // autoplay: '1000',
                pagination: false,
            }
        }
    },
    // components: {
    //     slider,
    //     slideritem
    // },
	created() {
		axios.get('/api/categories')
		    .then(response => {
		    	this.$store.commit('GET_CATEGORIES', response.data);
		    })
	},
	computed: {
		allCategories() {
			return this.$store.getters.getAllCategories;
		},
        filteredPacks: function(){
          return this.$store.getters.getAllCategories.filter((item) => {
            return item.name.toLowerCase().match(this.search);
          })
        }
	},
	methods: {
		selectCategory(category) {
			this.$store.commit('SELECT_CATEGORY', category.slug);
			// console.log(category.slug);
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
.border {
    border: 1px solid red;
    border-radius: 4px;
}
.border:hover {
    background-color: #6cb2eb !important;
}
.deed:hover {
    color: white !important;
}
.cursor {
    cursor: pointer;
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
