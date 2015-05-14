<?php

// Authentication Filters
Route::filter('auth', function() {
	if (Auth::guest()) return Redirect::guest(URL::route('acces'))
				->with('error', "Vous devez être identifié pour accéder à cette page.");
});

Route::filter('auth.basic', function() {
	return Auth::basic();
});

// Guest Filter
Route::filter('guest', function() {
	if (Auth::check()) return Redirect::to('/');
});

// Expressions régulières
Route::pattern('id', '[0-9]+');
Route::pattern('userid', '[0-9]+');
Route::pattern('token', '[0-9A-Za-z]+');

// Tchat
Route::get('/','TchatController@getIndex');
Route::post('ajouter_message','TchatController@postAjouter'); // Ajax
Route::get('refresh_liste_messages','TchatController@getRefreshListeMessages'); // Ajax
		
// Users		
Route::get('refresh_liste_users','TchatController@getRefreshListeUsers'); // Ajax
// Erreurs
//Route::get('erreur/404','ErreurController@erreur_404');

// Unauthenticated group
// Seul les visiteurs non identifiés
Route::group(array('before' => 'guest'), function() {

  	// Acces
	Route::get('acces', array('as'=>'acces','uses'=>'AccesController@getAcces'));
	Route::post('acces', array('as'=>'acces','uses'=>'AccesController@postAcces'));

});

// Authenticated group
// Seuls les visiteurs identifiés
Route::group(array('before' => 'auth'), function() {

	// Deconnexion
	Route::get('deconnexion', array ('as'=>'deconnexion','uses'=>'AccesController@getDeconnexion'));
	
});


//Admin Routes
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function() {
   	
   // Supprimer un message
   Route::post('supprimer-message', array('as'=>'supprimer-message','uses'=>'TchatController@postSupprimer'));
	
});

// Composer
View::composer(array('*'), function($view) {
	// Utilisateur //$this->user = Auth::user();
    $view->with('user', Auth::user());
});