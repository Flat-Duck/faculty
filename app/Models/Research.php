<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\Searchable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Research extends Model implements HasMedia
{
    use Notifiable,Searchable,HasFactory, InteractsWithMedia;

protected $table ="researches";
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'published_at', 
        'place','member_id'];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',           
            'published_at' => 'required|date',
            'place' => 'required|string',
            'member_id' => 'required|int',
  
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
