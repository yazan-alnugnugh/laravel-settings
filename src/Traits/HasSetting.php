<?php


namespace Yazan\Setting\Traits;


use Yazan\Setting\Setting;

trait HasSetting
{


    public function getSetting($key, $group = 'default'){

        $setting = $this->setting()
            ->where('key', $key)
            ->where('group', $group)
            ->first(['value']);

            return $setting ? $setting->value : null;

    }
    public function setSetting($key, $value = null, $group = 'default'){

        $setting = $this->setting()->updateOrCreate(
            ['key' => $key, 'model_type' => self::class, 'model_id' => $this->id, 'group' => $group],
            ['value' => $value]
        );

        return $setting;

    }
    public function clearSetting($key, $group = null){
        return $this->setting()
            ->where('key', $key)
            ->where('group', $group)
            ->delete();
    }
    public function cleanSetting($key, $group = 'default'){
        return $this->setting()
            ->where('key', $key)
            ->where('group', $group)
            ->update(['value' => '']);
    }
    public function clearSettingGroup($group = 'default'){
        return $this->setting()
            ->where('group', $group)
            ->delete();
    }
    public function cleanSettingGroup($group = 'default'){
        return $this->setting()
            ->where('group', $group)
            ->update(['value' => '']);
    }
    public function settingGroup($group = 'default'){
        $group = $this->setting()->where('group', $group,)->get(['key', 'value'])->toArray();

        $collectGroup = collect($group)->mapWithKeys(function($item) { return [$item['key'] => $item['value']];} )->all();

        return $collectGroup;
    }

    public function settingGroups(){

        $settings = $this->setting()->get(['group', 'key', 'value'])->toArray();
        $groups = [];

        foreach ($settings as $item):

            if(!isset($groups[$item['group']]) ) $groups[$item['group']] = [];

            $groups[$item['group']][$item['key']] = $item['value'];

       endforeach;

        return $groups;
    }

    public function getSettingsAttribute()
    {
        return $this->SettingGroups();
    }

    public function setting()
    {
        return $this->morphMany(Setting::class, 'model');
    }

    //  model event
    protected static function booted()
    {
        static::deleted(function ($model) {

            $model->setting()->delete();

        });
    }





}
