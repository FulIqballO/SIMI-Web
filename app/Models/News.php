<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //

    protected $table = 'news';

    protected $fillable = [
        'admin_id',
        'news_date',
        'news_image',
        'title',
        'description',
        
    ];

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }

}
