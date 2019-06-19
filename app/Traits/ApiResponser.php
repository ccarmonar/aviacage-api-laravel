<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser{

	private function successResponse($data, $code){
		return response()->json($data, $code);
	}

	protected function errorResponse($message, $code){
		return response()->json(['error' => $message, 'code' => $code], $code);
	}

	protected function showAll(Collection $collection, $code=200){
		//return $this->successResponse($collection, $code);
		return response()->json($collection,$code, [],JSON_NUMERIC_CHECK);
	}

	protected function showOne(Model $instance, $code=200){
		return $this->successResponse($instance, $code);
	}


	protected function showOne2($instance, $code=200){
		return $this->successResponse($instance, $code);
	}

}