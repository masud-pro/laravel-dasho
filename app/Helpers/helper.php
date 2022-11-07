<?php










/**
 * @param  $key
 * @return mixed
 */
function settings($key)
{
    /**
     * @var mixed
     */
    /**
     * @param $shop_id
     */
    static $settings;

    if (is_null($settings)) {
        $settings = \Illuminate\Support\Facades\Cache::remember('settings', 24 * 60, function () {
            return \App\Models\Setting::pluck('value', 'key')->toArray();
        });
    }

    return (is_array($key)) ? \Illuminate\Support\Arr::only($settings, $key) : $settings[$key];
}




















//