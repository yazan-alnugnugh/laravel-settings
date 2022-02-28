<?php


namespace Yazan\Setting\Interfaces;


interface SettingInterface
{
    public static function get($key, $group);
    public static function set($key, $value, $group);
    public static function clear($key, $group);
    public static function clean($key, $group);
    public static function clearGroup($group);
    public static function cleanGroup($group);
    public static function group($group);
    public static function groups();
}
