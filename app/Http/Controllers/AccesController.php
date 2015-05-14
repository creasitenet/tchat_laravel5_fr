<?php namespace App\Http\Controllers;

use Auth;
//use Illuminate\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Http\Response;
use Request;

class AccesController extends Controller {

	// Acces
	public function getAcces() {
		return view('acces.acces',array('titre'=>'Accés membre'));
	}
	
	// Post Acces
	public function postAcces() {
		$valid = Validator::make(Input::all(),
			array(
				'username' => 'required|min:5|max:20',
				'email' => 'required|email',
				'password' => 'required|min:5|max:20',
			)
		);
		// Erreur Validation
		if($valid->fails()) {
			return Redirect::route('acces')
			->withInput()
			->withErrors($valid);
		}
		// Validation ok
		if($valid->passes()) {
			// Déjà un utilsiateur avec cet identifiant et ce mot de passe ?
			$user = \App\User::where('username', '=', Input::get('username'))->first();
			// Utilisateur trouvé
			if($user) {
				// Bon mot de passe ?
				if (Auth::attempt(array('username' => $user->username, 'password' => Input::get('password')), true)) {
					Auth::login($user);
					// Maj de l'utilisateur
					$user->active = 1;
					$user->ip = Request::getClientIp();
					$user->last_login = date('Y-m-d H:i:s');
					$user->save();
					// Utilisateur trouvé, connecté
					return Redirect::back()
						->with('success', "Connecté."); 
				} else {
					// Identifiant ok mais pas le mot de passe.
					return Redirect::back()
						->withInput()
						->with('error', "Identifiant déjà pris."); 
				}
			} else { // Utilisateur non trouvé, identifiant disponible
				// Enregistre un nouvel utilisateur
				$e = new \App\User;
				$e->username = Input::get('username');
				$e->password = Hash::make(Input::get('password'));
				$e->email = Input::get('email');
				$e->active = 1;
				$e->token = str_random(60);
				$e->role = 1;
				$e->ip = Request::getClientIp();
				$e->last_login = date('Y-m-d H:i:s');
				$e->save();
				// Connexion forcée
				Auth::login($e);
				// Utilisateur inscrit, connecté
				return Redirect::back()
					->with('success', "Connecté."); 
			}
		}
		// Erreur enregistrement en base de donnée				
		return Redirect::back()
			->withInput()
			->with('unex-error');
	}

	// Déconnexion
	public function getDeconnexion() {
		Auth::user()->active = 0;
		Auth::logout();
		return Redirect::to('/')
			->with('success', 'Déconnecté')
			->with('success_flash', 'Déconnecté');
	}
	
}