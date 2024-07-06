<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class BulkEmail extends Model
{
    use HasUuids;

  protected $table = 'mails';
  protected $primaryKey = 'id';
  public $fillable = [
      'id',
      'email',

  ];
}
