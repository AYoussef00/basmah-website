<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['interest', 'name', 'phone', 'note', 'status'])]
class Lead extends Model
{
    //
}
