<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ejemplo 6 Vue.js - Manejo de eventos en Vue.js 2</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<style>
		.tached{
			text-decoration: line-through;
		}
	</style>
</head>
<body>
	<div id="app">
		<div class="container">
			<h2>LISTADO DE TAREAS</h2>
			<ul>
				<li v-for="task in tasks" :class="liTached(task)" @click="modifyTask(task)" >
					@{{task.title}}
					
				</li>
			</ul>
			<template v-if="taskIsPending.length">
				<h2>LISTADO DE TAREAS PENDIENTES</h2>
				<ul>
					<li v-for="task in taskIsPending">@{{task.title}}</li>
				</ul>
			</template>

			<form action="#">
				<input type="text" v-model="new_task">
				<button class="btn btn-primary" @click.prevent="createTask(true)">Crear nueva tarea</button>
				<button class="btn btn-primary" @click.prevent="createTask(false)" >Agregar tarea realizada</button>
			</form>
			
		</div>
	</div>
	<script type="text/javascript" src="https://unpkg.com/vue@2.2.6"></script>
	<script>
		var vm = new Vue({
			el: '#app',
			data: {
				new_task: "",				
				tasks: [
					{
						title:"Trabajar en mi proyecto",
						pending: true
					},
					{
						title:"Comprar ordenador",
						pending:false
					},
					{
						title:"Aprender más sobre Vuejs",
						pending:false
					},
					{
						title:"Disfrutar del tiempo libre",
						pending:true
					}
				]
			},
			computed:{
				taskIsPending:function(){
					return this.tasks.filter(function(item){
						return item.pending;
					});
				}
			},
			methods:{
				createTask: function(pending){
					vm.tasks.push({
						title: this.new_task,
						pending: pending
					});

					this.new_task='';
				},
				modifyTask: function(item){
					var item_filter=this.tasks.filter(function(it){
						if(it.title==item.title)
						{
							if(it.pending)
							{
								it.pending=false;																
							}
							else
							{
								it.pending=true;
							}
							return it.pending;
						}						
					});
					//console.log(this.searchTask);
				},
				liTached: function(item){
					if(!item.pending)
					{
						return "tached";
					}
				}
			}
		})
	</script>
</body>
</html>