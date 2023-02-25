<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    // use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'member_id' ,
        'number' ,
        'year' ,
        'promotion_date' ,
        'type' ,                
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'member_id' => 'required|numeric|exists:members,id',
            'number' => 'required|numeric|unique:decisions,number',
            'year' => 'required|numeric',
            'promotion_date' => 'required|date',            
            'type' => 'required|string',
            'researches' => 'required|array',
            'researches.*' => 'required|numeric|exists:researches,id',
        ];
    }

    /**
     * Get the providers for the Service.
     */
    public function providers()
    {
        return $this->belongsToMany('App\Provider');
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
