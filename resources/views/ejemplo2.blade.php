<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ejemplo 2 Vue.js - interpolaciones y directivas</title>
</head>
<body>
	<div id="app">
		<div class="container">
			<div class="welcome">

				<h1>
					@{{ name }} : @{{ reversedName }}
				</h1>
				{{-- Para evitar que se muestre un texto con variables que no queremos que se muestre por un segundo mientras carga la página usamos la directiva v-text="'texto ' + variable" para enlazar texto y variables por ejemplo pero que no se muestre mientras renderiza la página --}}
				<h2 v-text="'Bienvenido ' + name + ' : ' + reversedName"></h2>
				{{-- Con la directiva v-once evitamos que la variable cambie incluso desde el inspector de elementos del navegador --}}
				<h2 v-once>
					@{{ project }}
				</h2>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="https://unpkg.com/vue@2.2.6"></script>
	<script>
		var vm = new Vue({
			el: '#app',
			data: {
				name:'Angel',
				project: 'Mi Proyecto'
			},
			//computed es para hacer como php con los getters
			computed: {
				reversedName: function(){
					return this.name.split('').reverse().join('');
				}
			}

		});
	</script>
</body>
</html>