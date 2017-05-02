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
	data: function(){
		return {
			editing:false,
			draft:''
		}
	},
	template:'#task-template',
	props:['task','index'],
	methods:{
				
				toggleStatus: function(){
					this.task.pending=(this.task.pending)?false:true;
				},
				edit: function(){
					
					if(this.task.pending)
					{
						this.$set(this.task,'editing',true);	
						this.draft=this.task.description;					
					}
					
				},
				confirmChange:function(){
					this.task.description=this.draft;
					this.$set(this.task,'editing',false);
				},
				cancelChange:function(){
					this.$set(this.task,'editing',false);
				},
				remove: function(){					
					this.$emit('remove',this.index);
				}
				
			}
})

var vm = new Vue({
			el: '#app',
			data:{				
				tasks: [
					{
						description: 'Aprender Vue.js',
						pending: true
						
					},
					{
						description: 'Crear aplicaciones con Vue.js',
						pending: true
						
					},
					{
						description: 'Seguir el curso de vue.js',
						pending: false
						
					}
				],
				new_task:''
			},
			methods: {
				create: function(){
					this.tasks.push({
						description:this.new_task,
						pending:true,						
					});
					this.new_task='';
				},
				deleteCompleted: function(){
					this.tasks=this.tasks.filter(function(task){
						return task.pending;
					});
				},
				deleteTask: function(index){					
					this.tasks.splice(index,1);					
				}
			}
			

			
		});