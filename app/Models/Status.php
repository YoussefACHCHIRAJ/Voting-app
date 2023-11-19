<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public function ideas(){
        return $this->hasMany(Idea::class);
    }

    public function getStyle()
    {
        $styles = [
            'Open'=> 'bg-gray-200',
            'Considering' => 'bg-purple text-white',
            'In progress' => 'bg-yellow text-white',
            'Implemented' => 'bg-green text-white',
            'Closed' => 'bg-red text-white',
        ];
        return $styles[$this->name];
    }
}
