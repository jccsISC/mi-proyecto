//generando nuestro evenbus para crear el evento al crear un nuevo pokemon
//incorporamos a vue y le especificamos que haremos un require de vue
window.Vue = require('vue');


const bus = new Vue();

export default bus

//con esto tendriamos todo lo necesario para tener acceso al bus de comunicacion