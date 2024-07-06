<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ForumResource extends Model
{
    use HasUuids;

  protected $table = 'forum_resource';
  protected $primaryKey = 'id';
  public $fillable = [
      'id',
      'name',
      'active',
      'path'

  ];
}
