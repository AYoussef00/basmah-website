<?php

namespace App\Support;

class OdooOffers
{
    /**
     * @return list<string>
     */
    public static function interestOptions(): array
    {
        return [
            'استشارة Odoo',
            'تطبيق Odoo كامل',
            'محاسبة Odoo + الفوترة الإلكترونية',
            'مبيعات ومخزون Odoo',
            'موارد بشرية Odoo',
            'تجارة إلكترونية Odoo',
            'تخصيص وتطوير Odoo',
        ];
    }
}
