<template>
<div class="container my-5">
        <h2>Categoría Dos</h2>

        <div class="row">
            <div class="col-md-4 mt-4" v-for="two in this.twos " v-bind:key="two.id">

                <div class="card">
                    <img class="card-img-top" :src="`storage/${two.image}`" alt="card del restaurant" >
                    <div class="card-body">
                        <h3 class="card-title text-primary font-weight-bold"> {{ two.name }} </h3>
                        <p class="card-text"> {{two.address}}</p>
                        <p class="card-text">
                            <span class="font-weight-bold">Horario:</span>
                                {{two.open}} - {{two.close}}
                        </p>

                        <router-link :to="{ name: 'establecimiento', params: { id: two.id }}">
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
            getCategoryTwo() {
                axios.get('api/categories/sint-recusandae-nostrum')
                    .then(response => {
                        this.$store.commit('ADD_TWO', response.data);
                    })
            }
        },
        mounted() {
            this.getCategoryTwo();
        },
        computed: {
            twos() { // twos porque arriba iteramos con ese nombre
                return this.$store.state.twos;
            }
        }
    }
</script>