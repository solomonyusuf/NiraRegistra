<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasUuids;

  protected $table = 'schedules';
  protected $primaryKey = 'id';
  public $fillable = [
      'id',
      'month_id',
      'days_id',
      'day',
      'tag',
      'title',
      'start',
      'end',

  ];
}
