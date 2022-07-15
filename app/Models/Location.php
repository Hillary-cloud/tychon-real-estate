<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class Location extends Model
{
    use HasFactory;
    protected $table = 'locations';
    protected $fillable = ['name','slug'];

    public function properties(){
        return $this->hasMany(Property::class);
    }
    
}
