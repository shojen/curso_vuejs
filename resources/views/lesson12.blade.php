<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Curso VUE.JS 2</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"> 
</head>
<body>
	<div id="app" class="container">		
		<h1>Tareas</h1>			
		<ul class="list-group tasks">
			<li v-for="(task,index) in tasks" class="list-group-item" :class="{editing:task.editing, completed:!task.pending}">
				<a href="#" @click="toggleStatus(task)"><span class="glyphicon" :class="task.pending?  'glyphicon-unchecked': 'glyphicon-check'" aria-hidden="true"></span></a>
				
				<template v-if="task.editing">
					<input type="text" v-model="draft">
					<div class="pull-right" >
						<a href="#" @click="confirmChangeTask(task)"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
						<a href="#" @click="cancelChangeTask(task)"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>						
					</div>
				</template>
				<template v-else>
					<span class="description">@{{ task.description }}</span>
					<div class="pull-right">
						<a href="#" @click="editTask(task)"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
						<a href="#" @click="removeTask(index)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>											
					</div>
				</template>
			</li>
		</ul>
		<a href="#" @click="deleteCompleted()">Eliminar tareas completadas</a>
		<form @submit.prevent="createTask" class="new-task-form">
			<input v-model="new_task" type="text" class="form-control">
			<button class="btn btn-primary">Crear Tarea</button>
		</form>
	</div>

	<script type="text/javascript" src="https://unpkg.com/vue@2.2.6"></script>
	<script type="text/javascript" src="{{ asset('js/vm.js') }}"></script>
</body>
</html>