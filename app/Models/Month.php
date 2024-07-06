<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasUuids;

  protected $table = 'month';
  protected $primaryKey = 'id';
  public $fillable = [
      'id',
      'calender_id',
      'name',

  ];
}
