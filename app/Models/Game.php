<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    public $timestamps = false;

    protected $settingsAllowedFields = [
        'name',
        'win_rate',
        'credits'
    ];

    /**
     * Remove all non allowed fields from settings json
     */
    public function setSettingsAttribute($value)
    {
        $settings = [];

        foreach (json_decode($value, true) as $field => $value) {
            if (in_array($field, $this->settingsAllowedFields)) {
                $settings[$field] = $value;
            }
        }

        return $this->attributes['settings'] = json_encode($settings);
    }
}
