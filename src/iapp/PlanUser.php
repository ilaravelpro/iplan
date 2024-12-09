<?php
/*
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 4/17/24, 9:18 AM
 * Copyright (c) 2020-2024. Powered by www.iamir.net
 */

namespace iLaravel\iPlan\iApp;
use iLaravel\Core\iApp\Model;

class PlanUser extends Model
{
    public static $s_prefix = 'APU';
    public static $s_start = 24300000;
    public static $s_end = 728999999;

    public $with_resource_data = ['plan'];

    public $datetime = [
        'created_at' => 'Y-m-d H:i:s',
        'updated_at' => 'Y-m-d H:i:s',
        'payed_at' => 'Y-m-d H:i:s',
        'confirm_at' => 'Y-m-d H:i:s',
        'expired_at' => 'Y-m-d H:i:s',
    ];

    public function plan()
    {
        return $this->belongsTo(imodal('Plan'));
    }

    public function creator()
    {
        return $this->belongsTo(imodal('User'));
    }

    public function rules($request, $action, $arg1 = null, $arg2 = null) {
        $arg1 = $arg1 instanceof static ? $arg1 : (is_integer($arg1) ? static::find($arg1) : (is_string($arg1) ? static::findBySerial($arg1) : $arg1));
        $rules = [];
        switch ($action) {
            case 'store':
            case 'update':
                $rules = array_merge($rules, [
                    'title' => "required|string",
                    'price' => 'required|numeric',
                ]);
                break;
        }
        return $rules;
    }
}
