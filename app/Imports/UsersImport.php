<?php

namespace App\Imports;

use App\City;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new City([
            'point_code'  => $row[0],
         'point_name'   => $row[1],
         'union_name'   => $row[2],
         'thana'    => $row[3],
         'district'  => $row[4],
         'area_id'   => $row[5]
        ]);
    }
}
