Vue.component('app-icon',{
	template: '<span :class="cssClasses" aria-hidden="true"></span>',
	props:['img'],
	computed:{
		cssClasses:function(){
			return 'glyphicon glyphicon-'+this.img;
		}
	}
});

Vue.component('app-task',{
	template:'#task-template',
	props:['tasks','task','index'],
	methods:{
				createTask: function(){
					tasks.push({
						description:this.new_task,
						pending:true,
						editing:false
					});
					new_task='';
				},
				toggleStatus: function(){
					this.task.pending=(this.task.pending)?false:true;
				},
				edit: function(){
					
					this.tasks.forEach(function(task){
						task.editing=false;
					});
					if(this.task.pending)
					{
						this.task.editing=true;	
						this.draft=this.task.description;					
					}
					
				},
				confirmChange:function(){
					this.task.description=this.draft;
					this.task.editing=false;
				},
				cancelChange:function(){
					this.task.editing=false;
				},
				remove: function(){
					this.tasks.splice(this.index,1);
				},
				deleteCompleted: function(){
					this.tasks=this.tasks.filter(function(task){
						return task.pending;
					});
				}
			}
})

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
			

			
		});