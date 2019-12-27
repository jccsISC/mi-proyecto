<template>
    <div class="row"><!--la clase row nos posiciona a un lado los elementos-->
        <!--Mostramos nuestro spinner-->
        <spinner v-show="loading"></spinner>
        <div class="col-sm" v-for="(pokemon,ciclopokemon) in pokemons" :key="ciclopokemon"><!--toma en cuenta la cantidad de cards-->
            <div class="card text-center micard">
                <img class="card-img-top rounded-circle mx-auto d-block mi-imagen" v-bind:src="pokemon.picture" alt="">
                <div class="card-body">
                    <!--imprimimos cada trainer pero solo el nombre-->
                    <h5 class="card-title">{{ pokemon.name }}</h5>
                    <p class="card-text">{{ pokemon.description }} </p>
                    <a href="/trainers/" class="btn btn-primary">Ver más...</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    //importamos nuestro even-bus
    import EventBus from '../event-bus';
    
    export default {
        data(){
            return{
                pokemons: [],
                loading: true
            }
        },
        created(){
            EventBus.$on('pokemon-added',data => {
                this.pokemons.push(data)
            })
        },
        mounted(){
            //este es el ciclo de vida del componente es donde mandaremos las peticiones aqui utilizaremos axios
            axios
                .get('http://127.0.0.1:8000/pokemons')
                .then((res) => {
                    this.pokemons = res.data
                    this.loading = false
                })
        }
    }
</script>