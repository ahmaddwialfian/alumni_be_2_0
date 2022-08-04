<?php

namespace App\Models;

use Siakad\Model;

class MahasiswaModel extends Model
{
	protected $table = 'ak_mahasiswa';
	protected $keyType = 'string';
	public $incrementing = false;
}
