<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    protected $fillable = ['username', 'password', 'email'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

    public function roles()
    {
        return $this->belongsToMany('Role', 'users_roles');
    }

    /**
     * Find out if user has a specific role
     *
     * $return boolean
     */
    public function hasRole($check)
    {
        return in_array($check, array_fetch($this->roles->toArray(), 'name'));
    }

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

    /**
     * Passwords must always be Hashed
     *
     * @param $password
     */
    public function setPasswordAttribute ($password) {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Add roles to user
     */
    public function addRole($title)
    {
        $assigned_roles = array();

        $roles = Role::all()->toArray();

        switch ($title) {
            case 'admin':
                $assigned_roles[] = $this->getIdInArray($roles, 'admin');
                $assigned_roles[] = $this->getIdInArray($roles, 'public');
            case 'public':
                $assigned_roles[] = $this->getIdInArray($roles, 'public');
                break;
            default:
                throw new \Exception("The employee status entered does not exist");
        }

        $this->roles()->attach($assigned_roles);
    }

    /**
     * Get key in array with corresponding value
     *
     * @return int
     */
    private function getIdInArray($array, $term)
    {
        foreach ($array as $key) {
            if ($key['name'] == $term) {
                return $key['id'];
            }
        }

        throw new UnexpectedValueException;
    }

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
}
