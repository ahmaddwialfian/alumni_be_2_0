<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Siakad\Model;

class AlumniModel extends Model
{
    use HasFactory;

    protected $table = 'alumnis';
    protected $guarded = ['id'];
}
