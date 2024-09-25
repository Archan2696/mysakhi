<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class ExportForum implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('expert_forum')->get(); 
    }
}
