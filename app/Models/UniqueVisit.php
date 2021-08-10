<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniqueVisit extends Model
{
    use HasFactory;

    protected $fillable = ['ip'];
    protected $table = 'unique_visits';
}
