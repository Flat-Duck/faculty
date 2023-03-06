<?php

namespace App\Imports;

use App\Jobs\CalculateNextPromotion;
use App\Jobs\SendPromotionEmail;
use App\Models\Department;
use App\Models\Member;
use App\Models\Specialization;
use Carbon\Carbon;
// use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
// use Maatwebsite\Excel\Concerns\ToCollection;
// use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;

class MembersImport implements ToCollection, WithHeadingRow, SkipsOnError
{
    use Importable, SkipsErrors;
    // /**
    // * @param Model $model
    // */
    // public function model(array $row)
    // {
        
    // }
    public function collection(Collection $rows)
    {
        
        foreach ($rows as $row) {
           $member = Member::create( [
                'name' => $row['name'],
                'n_id' => $row['n_id'],
                'employment_date' => Carbon::now(),// $row['employment_date'],
                'department_id' => Department::firstOrCreate(['name' => $row['department_id']])->id,
                'specialization_id' => Specialization::firstOrCreate(['Name' => $row['specialization_id']])->id,
                'degree' => $row['degree'],
                'academic_degree' => $row['academic_degree'],                
                'last_pormotion_date' =>  Carbon::parse($row['last_pormotion_date']),
                //'next_pormotion_date' => $row['price'],
                'notes' => $row['notes'],
                'phone' => $row['phone'],
                'email' => $row['email']
                
                
            ]);
            
            CalculateNextPromotion::dispatch($member);
          
        }
    }
}
//         return new Member(
           
//         );
//     }
// }
