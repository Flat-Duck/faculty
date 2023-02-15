<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\Searchable;
class Research extends Model
{
     use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'member_id',
        'description',
        'file',
        'decision_id'
    ];

    

    public function getMinimumYears($degree,$academic_degrees)
    {
        if($academic_degrees == 'أستاذ'){
            return 0;
        }
        if($academic_degrees == 'أستاذ مساعد' && $degree == 'دكتوراة'){
            return 3;

        }elseif($academic_degrees == 'أستاذ مشارك' && $degree == 'ماجستير'){
            return 6;
        }else{
            return 4;
        }
    }
   
    /**
     * Validation rules
     *
     * @return array
     **/

    public static function validationRules()
    {
        return [
            'title'=> 'required|string',
            'member_id'=> 'required|string',
            'description'=> 'required|string',
            'file'=> 'required|string',
            'decision_id'=> 'required|string'            
        ];
    }

    /**
     * Get the providers for the Service.
     */
    public function decision()
    {
        return $this->belongsTo('App\Decision');
    }

    /**
     * Get the providers for the Service.
     */
    public function member()
    {
        return $this->belongsTo('App\Member');
    }

         /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList($search = null)
    {
        return static::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();
        
    }
}
