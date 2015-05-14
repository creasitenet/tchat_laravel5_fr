<?php namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Http\Response;
use Response;


class TchatController extends Controller {

	public function getIndex() {
		$messages = \App\Models\Message::orderBy('created_at','ASC')->get();
		$users = \App\User::where('active','=',1)->get();
		return view('tchat',array('messages'=>$messages,'users'=>$users));
	}
	
	// Ajouter un message // Appel Ajax
	public function postAjouter() {
    	$d['resultat']= 0;
    	if(!Auth::user()) {
    		$d['message'] = "Vous devez être identifié pour participer.";
    	} else {
			if (Input::get('valeur')=="") {
				$d['message'] = "Vous devez écrire quelque chose pour participer.";
			} else {
				// Enregistre le message
				$message = new \App\Models\Message;
				$message->user_id = Auth::user()->id;
				$message->texte = Input::get('valeur');
				$message->save();
				$d['resultat'] = 1;
				$d['message'] = "";
			}
		}
		// Le refresh est fait via un autre appel ajax
		// On envoi la réponse
		return response()->json($d);
	}
	
    // Refresh Liste des messages // Appel Ajax
    public function getRefreshListeMessages() {
		$messages = \App\Models\Message::orderBy('created_at','ASC')->get();
		$d = view('_messages',array('messages'=>$messages));
		return $d; // html
    }

    // Refresh Liste des utilisateurs // Appel Ajax
    public function getRefreshListeUsers() {
		$users = \App\User::where('active','=',1)->get();
		$d = view('_users',array('users'=>$users));
		return $d; // html
    }

	// Pour l'admin
	// Utilisateur avec role = 100
	public function destroy($id) {
		\App\Models\Message::delete($id);
		return response()->json(array('success' => true, 'message' => "Le message a été supprimé."));
	}

}