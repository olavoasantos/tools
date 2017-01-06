<?php
	function alert($data = []) {
		return app('App\Modules\Alert', ['data' => $data,]);
	}