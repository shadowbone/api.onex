<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helper\Src\Traits\UuidTrait;

class MasterSoalModel extends Model
{
	use UuidTrait;
	public $incrementing = false;
	// protected $primaryKey = 'id';
	protected $table = 'm_soal';
	protected $fillable = [
		'name',
		'keterangan',
		'type'
	];

}