<?php namespace App\Models;

use Eloquent;
use URL;

class Message extends Eloquent {

	protected $table = 'messages';
	protected $guarded = array('*');

	// Belong to User
	public function user() {
		return $this->belongsTo('App\User');
	}

	/*
	// Date de création
	public function date_de_creation() {
	    return date("d-m-y, H:i:s", strtotime($this->created_at));
	}

	// Date de création
	public function date_de_creation_courte() {
	    return date("d-m-y", strtotime($this->created_at));
	}
	*/


	public function delete() {
		return parent::delete();
	}

}