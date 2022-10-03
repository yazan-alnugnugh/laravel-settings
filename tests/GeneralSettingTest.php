<?php

namespace Yazan\Setting\Tests;

use Yazan\Setting\Setting;

class GeneralSettingTest extends TestCase
{
    public $settings = [
        'default' => [
            'age' => 18,
        ],
        'admins' => [
            'role' => 'super-admin',
        ],
    ];

    /** @test */
    public function it_can_set_key_value()
    {
        $setting = Setting::set('age', 18);

        static::assertEquals(18, $setting->value);
    }

    /** @test */
    public function it_can_get_key_value()
    {
        $setting = Setting::set('age', 18);

        static::assertEquals(18, Setting::get('age'));
    }

    /** @test */
    public function it_can_clear_key_value()
    {
        $setting = Setting::set('age', 18);
        $deletedSetting = Setting::clear('age');

        static::assertTrue(true, $deletedSetting);
    }

    /** @test */
    public function it_can_clean_key_value()
    {
        $setting = Setting::set('age', 18);
        $isCleanSetting = Setting::clean('age');

        static::assertEquals(1, $isCleanSetting);
    }

    /** @test */
    public function it_can_get_group()
    {
        $setting = Setting::set('age', 18);
        $settingGroup = Setting::group('default');

        static::assertEquals(['age' => 18], $settingGroup);
    }

    /** @test */
    public function it_can_get_groups()
    {
        $setting = Setting::set('age', 18);
        $setting = Setting::set('role', 'super-admin', 'admins');
        $settingGroups = Setting::groups('default');

        static::assertEquals($this->settings, $settingGroups);
    }

    /** @test */
    public function it_can_clear_group()
    {
        $setting = Setting::set('role', 'super-admin', 'admins');
        $isClearGroup = Setting::clearGroup('admins');

        static::assertTrue(true, $isClearGroup);
    }

    /** @test */
    public function it_can_clean_group_values()
    {
        $setting = Setting::set('role', 'super-admin', 'admins');
        $isClearGroup = Setting::clearGroup('admins');

        static::assertTrue(true, $isClearGroup);
    }
}
