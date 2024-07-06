<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasUuids;

  protected $table = 'document';
  protected $primaryKey = 'id';
  public $fillable = [
      'id',
      'registras_id',
      'name',
      'type',
      'path'

  ];
}
