<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Registra extends Model
{
    use HasUuids;
    protected $primaryKey = 'id';

  protected $table = 'registras';

  public $fillable = [
      'id',
      'logo',
      'email',
      'previous_names',
      'company_name',
      'phone_no',
      'country',
      'state',
      'address',
      'accredited',
      'debt',

  ];
}
