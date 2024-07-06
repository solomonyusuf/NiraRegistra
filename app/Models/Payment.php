<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasUuids;

  protected $table = 'payments';
  protected $primaryKey = 'id';
  public $fillable = [
      'id',
      'registras_id',
      'currency',
      'amount',
      'start',
      'end',
      'path',

  ];
}
