<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class ExportAppointment implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection() 
    { 
        return DB::table('book_forum')->get(); 
    }
}
