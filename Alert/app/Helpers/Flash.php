<?php
	function flash($data = []) {
		return app('App\Modules\Flash', ['data' => $data,]);
	}