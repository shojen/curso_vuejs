<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ejemplo 7 Vue.js - Filtros e interpolaciones de texto en Vue.js 2</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	
</head>
<body>
	<div id="app">
		<h2>Bienvenido @{{ name  | upper| title('Sr') }}</h2>
		<div>
			Precio: @{{price}} ==> @{{ price | money }}
		</div>
	</div>
	<script type="text/javascript" src="https://unpkg.com/vue@2.2.6"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.4/numeral.min.js"></script>
	<script>
		var vm = new Vue({
			el: "#app",
			data: {
				name: 'Angel',
				price: 10.554
			},
			filters: {
				upper: function(value){
					return value.toUpperCase();
				},
				title: function(value,title){					
					return title + '. ' + value;
				},
				money: function(value){
					return numeral(value).format('0.00');
				}
			}
		});
	</script>
</body>
</html>