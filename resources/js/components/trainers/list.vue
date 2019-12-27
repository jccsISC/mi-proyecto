<template>
    <div class="row"><!--la clase row nos posiciona a un lado los elementos-->
        <!--nos traemos el arreglo con los entrenadores y los vamos guardando en la variable trainer-->
        <div class="col-sm"><!--toma en cuenta la cantidad de cards-->
            <div class="card text-center micard">
                <img class="card-img-top rounded-circle mx-auto d-block mi-imagen" src="images/" alt="">
                <div class="card-body">
                    <!--imprimimos cada trainer pero solo el nombre-->
                    <h5 class="card-title">Ash</h5>
                    <p class="card-text">Descripcion</p>
                    <a href="/trainers/" class="btn btn-primary">Ver más...</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return{
                pokemons: [
                    {id:1, name: "Pikachi", description:"Es un pokemon del anime pokemons que cuando era pequeño veia"},
                    {id:2, name: "Squirtle", description:"Es un pokemon del anime pokemons que cuando era pequeño veia"},
                    {id:3, name: "Charizard", description:"Es un pokemon del anime pokemons que cuando era pequeño veia"}
                ]
            }
        },

        mounted(){
            console.log('ya esta montado')
        }
    }
</script>