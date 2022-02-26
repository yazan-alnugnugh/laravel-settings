<?php


namespace Yazan\Setting\Tests;



use Yazan\Setting\Models\User;
use Yazan\Setting\Setting;

class ModelSettingTest extends TestCase
{
    public $settings = [
        'default' => [
            'age' => 18
        ],
        'admins' => [
            'role' => 'super-admin'
        ]
    ];

    /** @test */
    public function it_can_set_key_value()
    {
        $user = $this->createUser();
        $setting =  $user->setSetting('age', 18);

        static::assertEquals(18, $setting->value);

    }

    /** @test */
    public function it_can_get_key_value()
    {

        $user = $this->createUser();
        $setting =  $user->setSetting('age', 18);


        static::assertEquals(18, $user->getSetting('age'));

    }

    /** @test */
    public function it_can_clear_key_value()
    {

        $user = $this->createUser();
        $setting =  $user->setSetting('age', 18);
        $deletedSetting =  $user->clearSetting('age');


        static::assertTrue(true, $deletedSetting);

    }
    /** @test */
    public function it_can_clean_key_value()
    {

        $user = $this->createUser();
        $setting =  $user->setSetting('age', 18);
        $isCleanSetting =  $user->cleanSetting('age');


        static::assertEquals(1, $isCleanSetting);

    }

    /** @test */
    public function it_can_get_group()
    {
        $user = $this->createUser();
        $setting =  $user->setSetting('age', 18);
        $settingGroup =  $user->settingGroup('default');

        static::assertEquals(['age' => 18], $settingGroup);


    }
    /** @test */
    public function it_can_get_groups()
    {
        $user = $this->createUser();
        $setting =  $user->setSetting('age', 18);
        $setting =  $user->setSetting('role', 'super-admin', 'admins');
        $settingGroups =  $user->settingGroups();



        static::assertEquals($this->settings, $settingGroups);

    }

    /** @test */
    public function it_can_clearGroup()
    {

        $user = $this->createUser();
        $setting =  $user->setSetting('role', 'super-admin', 'admins');
        $isClearGroup = $user->clearSettingGroup('admins');

        static::assertTrue(true, $isClearGroup);
    }
    /** @test */
    public function it_can_cleanGroup_values()
    {
        $user = $this->createUser();
        $setting =  $user->setSetting('role', 'super-admin', 'admins');
        $isClearGroup = $user->clearSettingGroup('admins');

        static::assertTrue(true, $isClearGroup);


    }

    public function createUser()
    {
        $user = new User();
        $user->name = 'Yazan';
        $user->save();
        return $user;
    }

}
