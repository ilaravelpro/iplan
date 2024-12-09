<?php
/*
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 4/17/24, 9:18 AM
 * Copyright (c) 2020-2024. Powered by www.iamir.net
 */

namespace iLaravel\iPlan\iApp;
use iLaravel\Core\iApp\Exceptions\iException;
use iLaravel\Core\iApp\Model;

class Plan extends Model
{
    public static $s_prefix = 'AP';
    public static $s_start = 900;
    public static $s_end = 26999;

    public $files = ['image', 'icon'];

    protected $casts = ['futures' => 'array'];

    protected static function boot()
    {
        parent::boot();
        parent::deleting(function (self $event){
            if ($event->users->count() > 0) {
                throw new iException('Due to the subscription of users in this plan, it cannot be deleted.');
            }
        });
    }

    public function getImageAttribute()
    {
        return $this->getFile('image');
    }

    public function creator()
    {
        return $this->belongsTo(imodal('User'));
    }

    public function users()
    {
        return $this->hasMany(imodal('PlanUser'));
    }

    public function rules($request, $action, $arg1 = null, $arg2 = null) {
        $arg1 = $arg1 instanceof static ? $arg1 : (is_integer($arg1) ? static::find($arg1) : (is_string($arg1) ? static::findBySerial($arg1) : $arg1));
        $rules = [];
        $additionalRules = [
            'image_file' => 'nullable|mimes:jpeg,jpg,png,gif|max:5120',
            'icon_file' => 'nullable|mimes:jpeg,jpg,png,gif|max:5120',
        ];
        switch ($action) {
            case 'store':
            case 'update':
                $rules = array_merge($rules, [
                    'title' => "required|string",
                    'price' => 'required|numeric',
                    'days' => 'required|numeric',
                    'type' => "nullable|string|in:app",
                    'summary' => "nullable|string",
                    'content' => "nullable|string",
                    'futures.profit.*' => "nullable|string",
                    'futures.loss.*' => "nullable|string",
                    'status' => 'nullable|in:' . join( ',', iconfig('status.plans', iconfig('status.global'))),
                ]);
                break;
            case 'additional':
                $rules = $additionalRules;
                break;
        }
        return $rules;
    }
}
