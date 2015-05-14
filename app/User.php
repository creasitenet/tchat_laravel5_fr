<?php namespace App;

use Eloquent;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use URL;

class User extends Eloquent implements AuthenticatableContract, CanResetPasswordContract {
		
	use Authenticatable, CanResetPassword;
	
	// table
	protected $table = 'users';
	protected $guarded = array('*');
	
	public function getAuthIdentifier()	{
		return $this->getKey();
	}

	public function getAuthPassword() {
		return $this->password;
	}

	public function getReminderEmail() {
		return $this->email;
	}

	public function getRememberToken() {
        return $this->remember_token;
    }

    public function setRememberToken($value) {
        $this->remember_token = $value;
    }

    public function getRememberTokenName() {
        return 'remember_token';
    } 
	
	public function date_inscription() {
	    return date("d-m-y, H:i:s", strtotime($this->created_at));
	}

	public function date_connexion() {
	    return date("d-m-y, H:i:s", strtotime($this->last_login));
	}
	
	public function messages() {
		return $this->hasMany('App\Models\Message','user_id');
	}
		
	public function gravatar() {
		$hash = md5(strtolower(trim($this->email)));
		return "http://www.gravatar.com/avatar/".$hash;
	}
	
}