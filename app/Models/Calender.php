<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
    use HasUuids;

  protected $table = 'calender';
  protected $primaryKey = 'id';
  public $fillable = [
      'id',
      'year',

  ];
}
