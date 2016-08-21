<?php

namespace App\Helper\Src\Traits;
use Uuid;
trait UuidTrait 
{

	protected static function boot(){
		parent::boot();
		static::creating(function($model){
			$model->{$model->getKeyName()} = Uuid::generate()->string;
		});
	}
}