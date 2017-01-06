<?php
	namespace App\Traits\User\Relationships;

	use App\User;

	trait belongsToUser
	{
		/**
		 *   Relationships
		 *   ------------------------------------------------------------------------
		 *   These are a collection of functions which are responsible for declaring
		 *   your User Model's relationships. It keeps things a
		 *   little more organized.
		 */

		/**
		 * A Model belongs to User.
		 *
		 * @return \Illuminate\Database\Eloquent\Relations\HasMany
		 */
		public function user()
		{
		    return $this->belongsTo(User::class);
		}

	}