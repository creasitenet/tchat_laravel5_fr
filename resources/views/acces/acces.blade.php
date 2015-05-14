@extends('layout')
@section('content')

	<br />
    <div class="col-sm-8 col-sm-offset-2">
    		<h2>Identifiez vous</h2>
    	  {!! Form::open(array('route' => 'acces')) !!}

                    	<div class="form-group margin-10 {{ $errors->has('username') ? ' has-error' : '' }}">
                        <div class="input-group0">
                    		{!! Form::text('username', null, 
                                    array(
                                    'class' => 'form-control input-lg', 
                                    'placeholder' => 'Identifiant', 
                                    'required')) !!}  
                    	</div>
                        <span class="help-block">{{ $errors->first('username') }}</span>            
                        </div>       
                    		
		            	<div id="FieldEmail" class="form-group margin-10 {{ $errors->has('email') ? ' has-error' : '' }}"> 
			                <div class="input-group0">
			            		{!! Form::text('email', null, 
		                            array(
		                            'class' => 'form-control input-lg', 
		                            'placeholder' => 'Adresse email valide (pour le gravatar)', 
		                            'required')) !!}
			            	</div>
			                <span id="ResEmail" class="help-block">{{ $errors->first('email') }}</span>            
			            </div>       
			            
                    	<div class="form-group margin-10 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="input-group0">
                    		{!! Form::password('password', 
                                    array(
                                    'class' => 'form-control input-lg', 
                                    'placeholder' => 'Mot de passe', 
                                    'required')) !!}  
                    	</div>
                        <span class="help-block">{{ $errors->first('password') }}</span>            
                        </div>       
                    		    
		                <div class="row">
		                    <div class="col-sm-8 col-sm-offset-2">                 
		                        {!! Form::submit('SE CONNECTER', array('name'=>'submit','class'=>'btn btn-primary btn-lg btn-block')) !!}
		                    </div>
		                </div>

           {!! Form::close() !!}
    </div>
    <br />

@stop 