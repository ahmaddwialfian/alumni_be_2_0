<?php

namespace App\Queries;

use App\Models\MahasiswaModel;
use Siakad\Query;

class MahasiswaQuery extends Query
{
	public static $modelClass = MahasiswaModel::class;
    public static $order = 'id';
}
