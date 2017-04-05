<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ejemplo 5 Vue.js - Listado de elementos con v-for en Vue 2</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
	<div id="app">
		<div class="container">
			<h2>LISTADO DE TAREAS</h2>
			<ul>
				<li v-for="task in tasks">
					<del v-if="!task.pending">@{{task.title}}</del>
					<template v-else>@{{task.title}}</template>
				</li>
			</ul>
			<template v-if="taskIsPending.length">
				<h2>LISTADO DE TAREAS PENDIENTES</h2>
				<ul>
					<li v-for="task in taskIsPending">@{{task.title}}</li>
				</ul>
			</template>
			<hr>
			<h2>Datos de Usuario</h2>
			<ul>
				<li v-for="(value,key) in user">@{{key}} : @{{value}}</li>
			</ul>
		</div>
	</div>
	<script type="text/javascript" src="https://unpkg.com/vue@2.2.6"></script>
	<script>
		var vm = new Vue({
			el: '#app',
			data: {
				user: {
					firstName: 'Angel',
					lastName: 'Rosso',
					userName: 'Shojen',
					website: 'angelrosso.com'
				},
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
			}
		})
	</script>
</body>
</html>