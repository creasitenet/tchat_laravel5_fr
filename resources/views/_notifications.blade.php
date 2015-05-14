
<div id="alertes">
	
	@if ($errors->any())
	<div class="alert alert-danger alert-block">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<div class="container">
		<!--<strong>{{Lang::get('notifications.title.error')}}</strong>-->
		<strong>Veuillez corriger les erreurs.</strong>
		</div>
	</div>
	@endif
	
	@if(Session::has('error'))
	<div class="alert alert-danger alert-block">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<div class="container">
		<!--<strong>{{Lang::get('notifications.title.error')}}</strong>-->
		<strong>{{ Session::get('error') }}</strong>
		</div>
	</div>
	@endif
	
	@if(Session::has('success'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<div class="container">
		<!--<strong>{{Lang::get('notifications.title.success')}} </strong>-->
		<strong>{{ Session::get('success') }}</strong>
		</div>
	</div>
	@endif

</div>
