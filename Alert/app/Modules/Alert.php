<?php
	namespace App\Modules;

	class Alert
	{

		/**
		 * Alert message array
		 *
		 * @var array
		 */
		private $data = [
			'highlight'  => '',
			'type'    => 'info',
			'message' => '',
			'icon'    => 'info',
		];

		public function __construct( Array $data = [] )
		{
			if ( sizeof( $data ) > 0 ) {
				$this->assignValues( $data );
				return $this->fire();
			}

			return $this;
		}

		/**
		 * It assigns the values from the data array to the $data attribute
		 *
		 * @param $data
		 */
		private function assignValues( $data )
		{
			$this->data[ 'highlight' ] = $data[ 'highlight' ] ?? '';
			$this->data[ 'message' ] = $data[ 'message' ] ?? '';
			$this->data[ 'type' ] = $data[ 'type' ] ?? 'info';
			$this->data[ 'icon' ] = $data[ 'icon' ] ?? 'info';
		}

		/**
		 * It stores the data to a flash session
		 */
		private function fire()
		{
			session()->flash( 'alert', $this->data );
		}

		/**
		 * It assigns a highlight text to the flash session
		 *
		 * @param $value
		 * @return $this
		 */
		public function highlight( $value )
		{
			$this->data[ 'highlight' ] = $value;
			$this->fire();

			return $this;
		}

		/**
		 * It assigns a alert text to the flash session
		 *
		 * @param $value
		 * @return $this
		 */
		public function message( $value )
		{
			$this->data[ 'message' ] = $value;
			$this->fire();

			return $this;
		}

		/**
		 * It assigns a message type to the flash session
		 *
		 * @param $value
		 * @return $this
		 */
		public function type( $value )
		{
			$this->data[ 'type' ] = $value;
			$this->fire();

			return $this;
		}

		/**
		 * It assigns the message icon to the flash session
		 *
		 * @param $value
		 * @return $this
		 */
		public function icon( $value )
		{
			$this->data[ 'icon' ] = $value;
			$this->fire();

			return $this;
		}

		/**
		 * It flashes a message.
		 *
		 * @param $message
		 */
		public function flash( $message )
		{
			$this->data[ 'highlight' ] = trans('alert.basic.highlight');
			$this->data[ 'message' ] = $message;
			$this->data[ 'type' ] = 'primary';
			$this->data[ 'icon' ] = 'bell';

			$this->fire();
		}

		/**
		 * It flashes an error message.
		 *
		 * @param $message
		 */
		public function error( $message )
		{
			$this->data[ 'highlight' ] = trans('alert.error.highlight');
			$this->data[ 'message' ] = $message;
			$this->data[ 'type' ] = 'error';
			$this->data[ 'icon' ] = 'exclamation';

			$this->fire();
		}

		/**
		 * It flashes an success message.
		 *
		 * @param $message
		 */
		public function success( $message )
		{
			$this->data[ 'highlight' ] = trans('alert.success.highlight');
			$this->data[ 'message' ] = $message;
			$this->data[ 'type' ] = 'success';
			$this->data[ 'icon' ] = 'check';

			$this->fire();
		}

		/**
		 * It flashes an warning message.
		 *
		 * @param $message
		 */
		public function warning( $message )
		{
			$this->data[ 'highlight' ] = trans('alert.warning.highlight');
			$this->data[ 'message' ] = $message;
			$this->data[ 'type' ] = 'warning';
			$this->data[ 'icon' ] = 'exclamation-triangle';

			$this->fire();
		}

		/**
		 * It flashes an info message.
		 *
		 * @param $message
		 */
		public function info( $message )
		{
			$this->data[ 'highlight' ] = trans('alert.info.highlight');
			$this->data[ 'message' ] = $message;
			$this->data[ 'type' ] = 'info';
			$this->data[ 'icon' ] = 'info';

			$this->fire();
		}

	}