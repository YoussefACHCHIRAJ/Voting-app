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

    public static function getCounts(){
        return Idea::query()
        ->selectRaw("count(*) as all_status")
        ->selectRaw("count(case when status_id = 1 then 1 end) as open")
        ->selectRaw("count(case when status_id = 2 then 1 end) as considering")
        ->selectRaw("count(case when status_id = 3 then 1 end) as in_progress")
        ->selectRaw("count(case when status_id = 4 then 1 end) as implemented")
        ->selectRaw("count(case when status_id = 5 then 1 end) as closed")
        ->first()
        ->toArray();
    }
}
