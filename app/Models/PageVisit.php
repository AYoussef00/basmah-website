<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['path', 'session_id', 'ip_address', 'visited_on'])]
class PageVisit extends Model
{
    protected function casts(): array
    {
        return [
            'visited_on' => 'date',
        ];
    }
}
