<?php

namespace App\Imports;

use App\Models\BulkMail;
use Maatwebsite\Excel\Concerns\ToModel;

class MailImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BulkMail([
            'email'     => $row['email'],
        ]);
    }
}
