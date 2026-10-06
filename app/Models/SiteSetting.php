<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['phone', 'email', 'address'])]
class SiteSetting extends Model
{
    public static function current(): self
    {
        return static::query()->firstOrCreate(
            ['id' => 1],
            [
                'phone' => '+966 50 000 0000',
                'email' => 'hello@basma.sa',
                'address' => 'الرياض، المملكة العربية السعودية',
            ],
        );
    }

    public function phoneHref(): string
    {
        $digits = preg_replace('/[^\d+]/', '', $this->phone) ?? '';

        return 'tel:'.$digits;
    }
}
