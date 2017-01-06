<?php
	namespace App\Traits\Profile;

	use App\Traits\User\Relationships\belongsToUser;

	trait Relationships
	{
		use belongsToUser;
	}