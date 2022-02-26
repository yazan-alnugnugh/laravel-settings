<?php

namespace Yazan\Setting\Database\Factories;

use Yazan\Setting\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactories extends Factory
{
    protected $model = Setting::class;

    public function definition()
    {
        return [
            'key' => 'name',
            'value' => 'Yazan'
        ];
    }
}
