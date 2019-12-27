<template>
  <div class="modal fade" id="addPokemon" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Pokemon</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!--detenemos el submit y lo manejamos conforme lo ocupemos, prevenimos que se envie y lo mandamos al metodo savePokemon-->
      	  <form @submit.prevent="savePokemon">
	          <div class="form-group">
			        <label>Pokemon</label>
			        <input type="text" class="form-control" placeholder="Ingresa el nombre del pokemon" v-model="name">
		  	    </div>
		  	    <div class="form-group">
			        <label>Picture</label>
			        <input type="text" class="form-control" placeholder="Ingresa la url de una imagen" v-model="picture">
		  	    </div>
            <div class="form-group">
			        <label>Description</label>
			        <input type="text" class="form-control" placeholder="Ingresa una descripción" v-model="description">
		  	    </div>

		  	    <button type="submit" class="btn btn-primary">Save</button>
	  	    </form>
        </div>
      </div>
    </div>
  </div>
</template>


<script>

    //importamos nuestro even-bus
    import EventBus from '../event-bus';

    export default {
      //definimos los atributos que utilizaremos
      data(){
        return{
          name: null,
          picture: null,
          description: null
        }
      },
      methods:{ //especificamos la seccion de metodos dentro de vue
        //definimos el metodo que le dimos al formulario
        savePokemon: function(){
         //de esta manera enviamos la informacion
         axios.post('http://127.0.0.1:8000/pokemons',{
            name: this.name,
            picture: this.picture,
            description: this.description
          })
          .then(function(res){
            //console.log(res.data.pokemon)//nos mostrara la respuesta de ese pokemon creado con la llave que creamos
            //le damos un hide a nuestro modal
            $('#addPokemon').modal('hide')
            //le especificamos que queremos emitir un evento
            EventBus.$emit('pokemon-added',res.data.pokemon)//con esto generamos un evento con informacion
          })
          .catch(function(err){
            console.log(err)
          });
        }
      }
    }
</script>

<style>
    
</style>