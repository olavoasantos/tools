<?php

	namespace App;

	use App\Traits\Slugable;
	use App\Traits\Profile\Relationships;
	use Illuminate\Database\Eloquent\Model;

	class Profile extends Model
	{
		use Slugable;
		use Relationships;

		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $fillable = [

		];

		/**
		 * Get the route key for the model.
		 *
		 * @return string
		 */
		public function getRouteKeyName()
		{
			return 'slug';
		}

	}
