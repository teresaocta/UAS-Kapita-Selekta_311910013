<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class best extends Model
{
    protected $table = 'bests';
    public $timestamps = false;
    use HasFactory;
}
