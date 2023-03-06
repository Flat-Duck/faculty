<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\Searchable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Notifications\AdminResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Member extends Model implements HasMedia
{
     
     use SoftDeletes, Notifiable,Searchable,HasFactory, InteractsWithMedia;

     public static function this_year()
     {
        return Member::whereMonth('next_pormotion_date', date('m'))
                        ->whereYear('next_pormotion_date', date('Y'))
                        ->get();
    }

     public function registerAllMediaConversions(?Media $media = null): void
     {
         $this->addMediaConversion('thumb_200')
         ->width(200)
         ->height(200);
 
         $this->addMediaConversion('thumb_500')
         ->width(500)
         ->height(500);
     }
 
     public function getAvatar($dimen)
     {
        $url = 'https://eu.ui-avatars.com/api/?name=' .urlencode($this->name);
        
        $avatar = $this->getMedia('avatars')->last();
        
        if($dimen == 500){
        
            return $avatar? $avatar->getUrl('thumb_500'): $url;
        
        }else if($dimen == 200){
        
            return $avatar? $avatar->getUrl('thumb_200'):$url;
        
        }
         return $url;
     }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'n_id', 'employment_date',
        'department_id', 'specialization_id',
        'degree', 'academic_degree',
        'last_pormotion_date', 
        'next_pormotion_date',
        'notes', 'phone', 'email',
        'picture'
    ];
    /**
     * The name of xxxxx
     *
     * @var array
     */
    CONST academic_degrees = [
        'ماجستير',
        'دكتوراة'
    ];

    public function getMinimumYears($academic_degrees,$degree)
    {
        if($degree == 'أستاذ'){
            return 0;
        }
        if($degree == 'أستاذ مساعد' && $academic_degrees == 'دكتوراة'){
            return 3;

        }elseif($degree == 'أستاذ مشارك' && $academic_degrees == 'ماجستير'){
            return 6;
        }else{
            return 4;
        }
    }

    public function hasAvailablePromotion(){
        if(is_null($this->next_pormotion_date)) return false;
        $eligble = $this->degree != 'أستاذ';
        if(!$eligble) return false;
        
        $now = Carbon::now();
        $due = new Carbon($this->next_pormotion_date);

        return $due <= $now;

    }
   
    /**
     * The name of xxxxx
     *
     * @var array
     */
    CONST degrees = [
        'أستاذ',
        'أستاذ مساعد',
        'أستاذ مشارك',
        'محاضر ',
        'محاضر مساعد '
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules($id = null)
    {
        return [
            'name'=> 'required|string',            
            'n_id'=> 'required|string|max:12|min:8|unique:members,n_id,'.$id,            
            'employment_date'=> 'required|date|before:' .date('Y-m-d'),
            'department_id'=> 'required|numeric',
            'specialization_id'=> 'required|numeric',
            'degree'=> 'required|string',
            'academic_degree'=> 'required|string',
            'last_pormotion_date'=> 'date|before:' .date('Y-m-d'),
            'notes'=> 'string|nullable',
            'phone'=> 'required|string',
            'email'=> 'required|email',
        ];
    }

    /**
     * Get the providers for the Service.
     */
    public function decisions()
    {
        return $this->hasMany('App\Models\Decision');
    }
        /**
     * Get the providers for the Service.
     */
    public function researches()
    {
        return $this->hasMany('App\Models\Research');
    }
        /**
     * Get the providers for the Service.
     */
    public function avaliableResearches()
    {
        return $this->researches()->whereNull('decision_id');
    }
    /**
     * Get the providers for the Service.
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
    /**
     * Get the providers for the Service.
     */
    public function specialization()
    {
        return $this->belongsTo('App\Models\Specialization');
    }

         /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList($search = null)
    {
        return static::search($search)->whereNull('is_archived')
            //->latest()
            ->paginate(12)
            ->withQueryString();
        
    }
         /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getArchived($search = null)
    {
        return static::search($search)->whereNotNull('is_archived')
            //->latest()
            ->paginate(10)
            ->withQueryString();
        
    }
         /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public  function addToArchive()
    {

        $this->is_archived = is_null($this->is_archived) ? Carbon::now() :null;
         //$this->is_archived = Carbon::now();
         $this->save();
        
    }

     /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public function calculateNextPromotionDate()
    {
        $years = $this->getMinimumYears($this->degree,$this->academic_degree);
        
        if($years > 0){
            $last_date = new Carbon($this->last_pormotion_date);
            $next_date = $last_date->addYears($years);
            $this->next_pormotion_date = $next_date;
            $this->save();
        }
    //->media->map(/*...*/);
    }
}
