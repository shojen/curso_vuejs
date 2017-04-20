<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ejemplo 8 Vue.js - Diferencias entre métodos, computed properties y filtros en Vue.js 2</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
	<div id="app">
		<div class="container">
			<div class="form-group">
				<input type="text" v-model="name" class="form-control">
			</div>
			<div class="form-group">
				<input type="text" v-model="email" class="form-control">
			</div>
			<p>Filter: @{{ name | reversed}}</p>
			<p>Function: @{{ reverse(name) }}</p>
			<p>Computed: @{{ reverseName }}</p>
			{{-- <p>Editando en Function: @{{ editName(name) }} </p> --}}
			<p>Editando en Computed @{{ editNameComputed }}</p>
		</div>
	</div>
	<script type="text/javascript" src="https://unpkg.com/vue@2.2.6"></script>
	<script>
		var vm = new Vue({
			el: '#app',
			data: {
				name: 'Angel',
				email: 'xxx@gmail.com'
			},
			//Los filters y computed property, sirven para hacer pequeños cambios en los datos antes de mostrarlos o validaciones, pero no para modificarlos. Para modificar los datos emplearemos los methods como buena práctica.
			filters:{
				reversed: function(value){
					return value.split('').reverse().join('') + ' ' + Math.random();
				}
			},
			methods: {
				reverse: function(value){					
					return value.split('').reverse().join('') + ' ' + Math.random();
				},
				editName: function(value){
			         this.name=value + 's';
			         return value;
		        }

			},
			//Cuando modificamos una variable que no esté en computed, no se llama a la función, al contrario que filters y methods que se llaman por cada cambio, por lo que son menos óptimas. Es decir, las computed property se centran más en una variable y los filters y methods son más generales
			computed: {
				reverseName: function(){
					return this.name.split('').reverse().join('') + ' ' + Math.random();
				},
				editNameComputed: function(){
					this.name=this.name + 's';
					return this.name;
				}
			}
		})
	</script>
</body>
</html>