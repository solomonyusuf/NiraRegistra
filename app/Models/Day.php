<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasUuids;

  protected $table = 'days';
  protected $primaryKey = 'id';
  public $fillable = [
      'id',
      'month_id',
      'name',
      'day',

  ];
}
