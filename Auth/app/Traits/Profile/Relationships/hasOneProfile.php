<?php
	namespace App\Traits\Profile\Relationships;

	use App\Profile;

	trait hasOneProfile
	{
		/**
		 *   Relationships
		 *   ------------------------------------------------------------------------
		 *   These are a collection of functions which are responsible for declaring
		 *   your User Model's relationships. It keeps things a
		 *   little more organized.
		 */

		/**
		 * A Model has one Profile.
		 *
		 * @return \Illuminate\Database\Eloquent\Relations\HasMany
		 */
		public function profile()
		{
		    return $this->hasOne(Profile::class);
		}

	}