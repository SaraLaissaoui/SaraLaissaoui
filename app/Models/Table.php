<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TableStatusEnum;

class Table extends Model
{
    use HasFactory;

    public function room(){
        return $this->belongsTo(Rooms::class);
    }

    
}
