<template>
<div class="container my-5">
        <h2>Categoría uno</h2>

        <div class="row">
            <div class="col-md-4 mt-4" v-for="one in this.ones " v-bind:key="one.id">

                <div class="card">
                    <img class="card-img-top" :src="`storage/${one.image}`" alt="card del restaurant" >
                    <div class="card-body">
                        <h3 class="card-title text-primary font-weight-bold"> {{ one.name }} </h3>
                        <p class="card-text"> {{one.address}}</p>
                        <p class="card-text">
                            <span class="font-weight-bold">Horario:</span>
                                {{one.open}} - {{one.close}}
                        </p>

                        <router-link :to="{ name: 'establecimiento', params: { id: one.id }}">
                            <a class="btn btn-primary d-block">Ver Lugar</a>
                        </router-link>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		methods: {
			getCategoryOne() {
				axios.get('api/categories/restaurante')
					.then(response => {
						this.$store.commit('ADD_ONE', response.data);
					})
                    .catch(error => {
                        console.log(error)
                    })
			}
		},
		mounted() {
			this.getCategoryOne();
		},
		computed: {
			ones() { // ones porque arriba iteramos con ese nombre
				return this.$store.state.ones;
			}
		}
	}
</script>