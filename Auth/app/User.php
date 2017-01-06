<?php

	namespace App;

	use App\Traits\User\Relationships;
	use Illuminate\Foundation\Auth\User as Authenticatable;

	class User extends Authenticatable
	{
		use Relationships;

		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $fillable = [
			'email', 'password',
		];

		/**
		 * The attributes that should be hidden for arrays.
		 *
		 * @var array
		 */
		protected $hidden = [
			'password', 'remember_token',
		];
	}
