<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class DatabaseKey extends Model
{
    use HasUuids;

  protected $table = 'database_keys';
  protected $primaryKey = 'id';
  public $fillable = [
      'id',
      'key',
      'approved_date',

  ];
}
