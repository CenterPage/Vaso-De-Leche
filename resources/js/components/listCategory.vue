<template>
	<div class="">
		<nav class="d-flex flex-column flex-md-row container justify-md-center">
			<a @click="selectAll">Todos</a>
			<a 
				v-for="category in allCategories"
				:key="category.id"
				@click="selectCategory(category)"
			>
				{{ category.name }}
			</a>
		</nav>
	</div>
</template>

<script>
export default {
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
div {
  background-color: #6272d4;
}
nav a {
  color: white;
  font-weight: bold;
  text-transform: uppercase;
  padding: 0.5rem 2rem;
  text-align: center;
  flex: 1;
}
nav a:hover {
  color: white;
  cursor: pointer;
}
nav a:nth-child(1) {
  background-color: #a000b7;
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
}
</style>