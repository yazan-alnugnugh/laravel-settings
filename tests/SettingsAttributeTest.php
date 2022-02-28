<?php


namespace Yazan\Setting\Tests;



use Yazan\Setting\Models\User;
use Yazan\Setting\Setting;

class SettingsAttributeTest extends TestCase
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
    public function it_can_get_settings_attribute()
    {
        $user = $this->createUser();
        $setting =  $user->setSetting('age', 18);
        $setting =  $user->setSetting('role', 'super-admin', 'admins');
        $settingsAttribute =  $user->settings;


        static::assertEquals($this->settings, $settingsAttribute);

    }



    public function createUser()
    {
        $user = new User();
        $user->name = 'Yazan';
        $user->save();
        return $user;
    }

}
