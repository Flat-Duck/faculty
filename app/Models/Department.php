<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\Searchable;

class Department extends Model
{
    use Searchable;


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
      /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules($id=null)
    {
        return [
            'name' => 'required|string|unique:departments,name,'.$id,
        ];
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
