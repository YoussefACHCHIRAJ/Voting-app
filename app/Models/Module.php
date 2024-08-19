<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    public function exercices(){
        return $this->hasMany(Exercice::class);
    }

    public function getStyle()
    {
        $styles = [
            'DATABASE'=> 'bg-yellow text-gray-900',
            'JAVA OOP' => 'bg-purple text-gray-900',
            'SCRIPT BASH' => 'bg-green text-gray-900',
            'WEB' => 'bg-red text-gray-900',
        ];
        return $styles[$this->name];
    }

    public static function getCounts(){
        // db is database and sh is script bash
        return Exercice::query()
        ->selectRaw("count(*) as all_modules")
        ->selectRaw("count(case when module_id = 1 then 1 end) as db")
        ->selectRaw("count(case when module_id = 2 then 1 end) as java_oop")
        ->selectRaw("count(case when module_id = 3 then 1 end) as web")
        ->selectRaw("count(case when module_id = 4 then 1 end) as sh")
        ->first()
        ->toArray();
    }
}
