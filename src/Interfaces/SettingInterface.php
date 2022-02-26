<?php


namespace Yazan\Setting\Interfaces;


interface SettingInterface
{
    public static function get($key, string $group = 'default');
    public static function set($key, $value, string $group = 'default');
    public static function clear($key, string $group = 'default');
    public static function clean($key, string $group = 'default');
    public static function clearGroup(string $group = 'default');
    public static function cleanGroup(string $group = 'default');
    public static function group(string $group = 'default');
}
