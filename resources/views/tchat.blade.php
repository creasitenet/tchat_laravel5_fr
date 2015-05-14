@extends('layout')
@section('content')

    <!-- Tchat -->
    <br />
    
    <div id="tchat">
       <div id="messages">
           @foreach ($messages as $m)
           <div class="message">
                <div class="gravatar"> 
                    <img src="{{ $m->user->gravatar() }}" class="img-responsive" alt="{{ $m->username }}" />
                </div>
                <div class"texte">
                    <p class="username">{{ $m->user->username }} <span class="date">le {{ $m->created_at }}</span></p>
                    <p class="textem">{{ $m->texte }}</p>
                </div>
           <div class="clearfix"></div>
           </div>
      	   @endforeach
       </div>
    </div>

       <div id="nouveau">
       		<form action="#">
       			<div class="input-group"> 
            	<input type="text" class="form-control ajouter" id="texte" name="texte" placeholder="" autofocus autocomplete="off" />
            	<span class="input-group-btn">
                    <button type="button" class="btn btn-primary" onclick="ajouter_message($('#texte').val())">ENVOYER</button>
             	</span>
             	</div>
            </form>
       </div>

	<div class="clearfix"></div>
	<br />

@stop