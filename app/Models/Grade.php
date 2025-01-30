<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Grade extends Model
{
    use HasTranslations;
    public $translatable = ['name'];

    use HasFactory;
    protected $fillable = ['name', 'notes'];

    public function ClassRoom()
    {
        return $this->hasMany(ClassRoom::class);
    }
}
