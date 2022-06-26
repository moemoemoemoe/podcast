<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;
    protected $fillable= ['category_id' , 'pod_name' , 'pod_description' ,'pod_url' ,'status'];

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
