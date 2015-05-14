    
<!-- Gauche -->
<div id="gauche" class="gauche">            
    <div class="ingauche">
    	
    	<!-- Logo -->
		<div class="logo">
	    	<a href="{{ URL::to('/') }}" class="">
	        	Tchat
	        </a>
	    </div>
		<!-- // Logo -->
		
		<!-- Menu -->
		<div class="users">
		    <ul id="users">
				@if (isset($users)) 
					@foreach ($users as $u)
						<li>
							{{ $u->username }}
					    </li>
					@endforeach
				@endif
			</ul>
		</div>
	    <!-- // Menu --> 
	
		<!-- Menu -->
		<div class="menu">
		    <ul>
				@unless(Auth::user())
				<li><br /><a href="{{ URL::to('acces')}}">Se connecter</a></li>
				@endif
				
				@if(Auth::user())
				<li><br /><a href="{{ URL::to('deconnexion')}}">Se déconnecter</a></li>
				@endif
			</ul>
		</div>
	    <!-- // Menu --> 
	    
	</div>    
</div>   