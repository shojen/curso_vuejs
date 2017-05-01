var vm = new Vue({
			el: '#app',
			data:{
				draft:'',
				tasks: [
					{
						description: 'Aprender Vue.js',
						pending: true,
						editing: false
					},
					{
						description: 'Crear aplicaciones con Vue.js',
						pending: true,
						editing: false
					},
					{
						description: 'Seguir el curso de vue.js',
						pending: false,
						editing: false
					}
				],
				new_task:''
			},
			methods:{
				createTask: function(){
					this.tasks.push({
						description:this.new_task,
						pending:true,
						editing:false
					});
					this.new_task='';
				},
				toggleStatus: function(task){
					task.pending=(task.pending)?false:true;
				},
				editTask: function(task){
					
					this.tasks.forEach(function(task){
						task.editing=false;
					});
					if(task.pending)
					{
						task.editing=true;	
						this.draft=task.description;					
					}
					
				},
				confirmChangeTask:function(task){
					task.description=this.draft;
					task.editing=false;
				},
				cancelChangeTask:function(task){
					task.editing=false;
				},
				removeTask: function(index){
					this.tasks.splice(index,1);
				},
				deleteCompleted: function(){
					this.tasks=this.tasks.filter(function(task){
						return task.pending;
					});
				}
			}

			
		});