<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class EducationalResource extends Model
{
    use HasUuids;

  protected $table = 'academic_resource';
  protected $primaryKey = 'id';
  public $fillable = [
      'id',
      'name',
      'active',
      'path'

  ];
}
