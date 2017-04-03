<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">        
        
    </head>
    <body>
        <div class="content container">
            <div v-if="!formSubmited">
                <form action="#" @submit.prevent="submitForm">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-9 col-xs-offset-3">
                                <label for="first_name">Nombre:</label>
                            </div>
                            <div class="col-xs-6 col-xs-offset-3">                            
                                <input type="text" class="form-control" id='first_name' name='first_name' v-model='first_name'>
                            </div>                        
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-9 col-xs-offset-3">
                                <label for="last_name">apellido:</label>                            
                            </div>
                            <div class="col-xs-6 col-xs-offset-3">                            
                                <input type="text" class="form-control" id='last_name' name='last_name' v-model='last_name'>                            
                            </div>                        
                        </div>
                    </div>
                    <button id='btn-continue' class='btn btn-primary center-block' :disabled="!isFormValid()">Continuar</button>
                </form>                
            </div>
            <div v-else>
                <div class="panel panel-success">
                    <h1>Bienvenido, @{{first_name}} @{{last_name}}</h1> 
                </div>                
            </div>
        </div>
        {{-- <script src="{!! asset('js/vue.js') !!}"></script> --}}
        <script type="text/javascript" src="https://unpkg.com/vue@2.2.6"></script>
        <script type="text/javascript">
            new Vue ({
                el: ".content",
                data: {
                    first_name: "",
                    last_name: "",
                    formSubmited:false
                },
                methods: {
                    isFormValid: function(){
                        return this.first_name != '' && this.last_name!='';//Cuando ponemos this podemos llamar directamente a las variables de data
                    },
                    submitForm: function(e){
                                                
                        if(!this.isFormValid()){return;}

                        this.formSubmited=true;
                        return true;
                    }
                }
            });
        </script>
    </body>
</html>
