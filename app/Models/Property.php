<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Location;

class Property extends Model
{
    use HasFactory;
    protected $table = 'properties';
    protected $guarded = [];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function location(){
        return $this->belongsTo(Location::class, 'location_id');
    }
}
