<?php
	namespace App\Traits;

	trait Slugable
	{
		/**
		 * Generates a unique slug.
		 *
		 * @param String        $string
		 * @param string        $prefix
		 * @param \Closure|null $prepareFields
		 * @return string
		 */
		public function generateSlug( $string, $prefix = "", \Closure $prepareFields = null )
		{
			// Prepare $string
			if ( ! is_null( $prepareFields ) ) {
				$slug = $prepareFields( $string );
			} else {
				$slug = $string;
			}

			// Add prefix
			$slug = implode( "", [ $prefix, $slug ] );

			// Check if is unique
			while ( ! $this->slugIsUnique( $slug ) ) {
				$slug = implode( "-", [ $slug, str_random( 6 ) ] );
			}

			$this->slug = strtolower( $slug );
		}

		/**
		 * Checks if slug is unique.
		 *
		 * @param $slug
		 * @return bool
		 */
		public function slugIsUnique( $slug )
		{
			$c = get_class( $this );
			return count( $c::whereSlug( $slug )->first() ) < 1;
		}
	}