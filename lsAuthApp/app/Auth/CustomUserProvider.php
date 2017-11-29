<?php 
namespace App\Auth;

use Illuminate\Contracts\Auth\User as UserContract;
use Illuminate\Auth\UserProviderInterface;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\GenericUser;
use Carbon\Carbon;
use App\User;
class CustomUserProvider implements UserProvider {

	protected $model;

	public function __construct(UserContract $model)
	{
		$this->model = $model;
	}

	public function retrieveById($identifier)
	{
		$qry = User::where('email','=',$identifier);
		if($qry->count() >0)
		{
			$user = $qry->select('name', 'email','password')->first();
	
			$attributes = array(
				'id' => $user->id,
				'name' => $user->name,
				'password' => $user->password,
			);
	
			return $user;
		}
		return null;
	}

	public function retrieveByToken($identifier, $token)
	{
		$qry = User::where('email','=',$identifier)->where('remember_token','=',$token);
		if($qry->count() >0){
			$user = $qry->select('name', 'email','password')->first();

			$attributes = array(
				'id' => $user->id,
				'name' => $user->name,
				'password' => $user->password,
			);
			return $user;
		}
		return null;
	}

	public function updateRememberToken(UserContract $user, $token)
	{
		$user->setRememberToken($token);
		
			$user->save();
	}

	public function retrieveByCredentials(array $credentials)
	{
		$qry = User::where('name','=',$credentials['name']);
		if($qry->count() >0){
			$user = $qry->select('name', 'email','password')->first();

			
			return $user;
		}
		return null;
	}

	public function validateCredentials(UserContract $user, array $credentials)
	{
		if($user->name == $credentials['name'] && $user->getAuthPassword() == md5($credentials['password'].\Config::get('constants.SALT')))
		{
	
			$user->last_login_time = Carbon::now();
			$user->save();
	
			return true;
		}
		return false;

	}

}