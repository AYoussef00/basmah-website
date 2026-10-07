<?php

namespace Database\Seeders;

use App\Models\Addon;
use Illuminate\Database\Seeder;

class AddonSeeder extends Seeder
{
    public function run(): void
    {
        $addons = [
            [
                'title' => 'صفحة هبوط',
                'description' => 'صفحة واحدة مصممة لإطلاق منتج أو حملة إعلانية',
                'sort_order' => 1,
            ],
            [
                'title' => 'موقع تعريفي',
                'description' => 'عدة صفحات، تصميم متجاوب مع الجوال وربط بوسائل التواصل',
                'sort_order' => 2,
            ],
            [
                'title' => 'متجر إلكتروني',
                'description' => 'عرض المنتجات وسلة الشراء والدفع الإلكتروني ولوحة تحكم',
                'sort_order' => 3,
            ],
            [
                'title' => 'شات بوت',
                'description' => 'ردود تلقائية وأسئلة شائعة بربط واتساب أو الموقع',
                'sort_order' => 4,
            ],
        ];

        foreach ($addons as $addon) {
            Addon::query()->updateOrCreate(
                ['title' => $addon['title']],
                [
                    'description' => $addon['description'],
                    'sort_order' => $addon['sort_order'],
                    'is_active' => true,
                ],
            );
        }
    }
}
