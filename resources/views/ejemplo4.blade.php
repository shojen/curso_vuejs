<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ejemplo 4 Vue.js - Mostrar y ocultar elementos v-if, v-else, v-show con vue.js 2</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
	<div id="app">
		<div class="container">
			<pre>
				@{{ $data }}
			</pre>
			<h1>Formulario</h1>
			<form v-on:submit.prevent="sumbitForm" action="#">
				<div class="form-group">
					{{-- Required --}}
					<h4>¿Has trabajado alguna vez con Vue.js?</h4>
					<div class="radio">
						<label class="radio-inline" >
							<input v-model="vue.exp" type="radio" :value="true"> Sí
						</label>
						<label class="radio-inline">
							<input v-model="vue.exp" type="radio" :value="false"> No
						</label>
					</div>
				</div>
				<!-- Cuando usamos la directiva v-if v-else, lo que no mostremos lo elimina del DOM sin embargo, si usamos v-show en su lugar lo oculta con un display:none y no funciona con la etiqueta template, así que hay que ponerle un div-->
				<template v-if="vue.exp">
					<div class="form-group">
						<label for="vue_years">¿Cuantos años has trabajado con Vue?</label>
						<input class='form-control' type="number" name="vue_years" v-model="vue.years">
					</div>
					<!-- De ésta forma vue mostrará uno u otro, pero cuando editemos un campo también se editará el otro aunque no se muestre -->
					<div v-if="vue.years<=1" class="form-group">
						<label>¿Qué te motivó para aprender Vue?</label>
						<textarea v-model="vue.descriptions" cols="30" rows="10" class='form-control'></textarea>
					</div>
					<div v-else class="form-group">
						<label>Cuéntanos tu experiencia con Vue</label>
						<textarea v-model="vue.descriptions" class='form-control' cols="30" rows="10"></textarea>
					</div>
					<!--  
						Poniendo name en vez de v-model, vue optimiza y no cambia el valor del textarea al aumentar los años de experiencia despues de haber escrito algo..aunque no lo toma en el objeto vue.descriptions
					<div v-if="vue.years<=1" class="form-group">
						<label>¿Qué te motivó para aprender Vue?</label>
						<textarea name="descriptions1" cols="30" rows="10" class='form-control'></textarea>
					</div>
					<div v-else class="form-group">
						<label>Cuéntanos tu experiencia con Vue</label>
						<textarea name="descriptions2" class='form-control' cols="30" rows="10"></textarea>
					</div> 
					-->
					<!-- 
					Para forzar de que el campo del textarea se formatee y sea como si fuesen 2 textarea (como realmente son), se le pone la propiedad key, estas propiedades se mueden mezclar, es decir se puede poner tanto la name, como la v-model además de key.
					<div v-if="vue.years<=1" class="form-group">
						<label>¿Qué te motivó para aprender Vue?</label>
						<textarea key="descriptions1" cols="30" rows="10" class='form-control'></textarea>
					</div>
					<div v-else class="form-group">
						<label>Cuéntanos tu experiencia con Vue</label>
						<textarea key="descriptions2" class='form-control' cols="30" rows="10"></textarea>
					</div> 
					-->
					
						<p v-if="descriptionsError" class="alert" :class="descriptionsAlerts">@{{descriptionsError}}</p>
					
					
						
					
				</template>
				
			</form>
		</div>
	</div>
	<script type="text/javascript" src="https://unpkg.com/vue@2.2.6"></script>
	<script>
		var vm = new Vue({
			el: '#app',
			data: {
				vue: {
					exp: null,
					years: 0,
					descriptions: ''
				}
			},
			computed:{
				descriptionsError: function(){
					var val = this.vue.descriptions.trim();

					if(val=='')
					{
						return 'El campo es obligatorio';
					}
					if(val.length<5){
						return 'Debes escribir más de 5 caractéres';
					}
					if (val.length>20)
					{
						return 'Debes de escribir menos de 20 caractéres';
					}
				},
				descriptionsAlerts: function(){
					if(this.descriptionsError)
					{
						return 'alert-danger';
					}					
				}
			}
		})
	</script>
</body>
</html>