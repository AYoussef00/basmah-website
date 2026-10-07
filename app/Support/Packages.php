<?php

namespace App\Support;

class Packages
{
    /**
     * @return list<string>
     */
    public static function names(): array
    {
        return array_keys(self::prices());
    }

    /**
     * @return array<string, int>
     */
    public static function prices(): array
    {
        return [
            'باقة الحضور' => 1900,
            'باقة النمو' => 3900,
            'باقة الشراكة' => 7600,
        ];
    }

    public static function monthlyAmount(string $package): int
    {
        return self::prices()[$package] ?? 0;
    }

    public static function isPackage(string $name): bool
    {
        return array_key_exists($name, self::prices());
    }
}
