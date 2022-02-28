<?php


namespace Yazan\Setting;
use Yazan\Setting\Models\Setting as Model;
use Yazan\Setting\Interfaces\SettingInterface;
use Yazan\Setting\Traits\Scope;

class Setting extends Model implements SettingInterface
{
    use Scope;

    public static function get($key,  $group = 'default')
    {
                $setting =  (new self)->relationNull()->where('key', $key)->
                where('group', $group)->pluck('value');
                return optional($setting)[0];

    }

    public static function set($key, $value,  $group = 'default')
    {

        $setting = (new self)->updateOrCreate(
          ['key' => $key, 'model_type' => null, 'model_id' => null, 'group' => $group],
          ['value' => $value]
        );

        return $setting;
    }

    public static function clear($key,  $group = 'default')
    {
        $setting =   (new self)->relationNull()
            ->where('key', $key,)
            ->where('group', $group,)
            ->first();

        return $setting && $setting->delete();

    }

    public static function clean($key, $group = 'default')
    {
        return $setting = (new self)->relationNull()
            ->where('key', $key,)
            ->where('group', $group,)
            ->update(['value' => null]);

    }

    public static function clearGroup( $group = 'default')
    {
        return (new self)->relationNull()->where('group', $group,)->delete();

    }

    public static function cleanGroup( $group = 'default')
    {
        return (new self)->relationNull()->where('group', $group,)->update(['value' => '']);

    }

    public static function group( $group = 'default')
    {
        $group = (new self)->relationNull()->where('group', $group,)->get(['key', 'value'])->toArray();

        $collectGroup = collect($group)->mapWithKeys(function($item) { return [$item['key'] => $item['value']];} )->all();

        return $collectGroup;
    }

    public static function groups(){

        $settings = (new self)->relationNull()->get(['key', 'value', 'group'])->toArray();
        $groups = [];

        foreach ($settings as $item):

            if(!isset($groups[$item['group']]) ) $groups[$item['group']] = [];

            $groups[$item['group']][$item['key']] = $item['value'];

        endforeach;

        return $groups;
    }




}
