<?php


/*
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 4/17/24, 9:18 AM
 * Copyright (c) 2020-2024. Powered by www.iamir.net
 */

namespace iLaravel\iPlan\iApp\Http\Controllers\API\v1;



class PlanUserController extends \iLaravel\Core\iApp\Http\Controllers\API\ApiController
{
    public function filters($request, $model, $parent = null, $operators = [])
    {
        $filters = [
            [
                'name' => 'all',
                'title' => _t('all'),
                'type' => 'text',
            ],
            [
                'name' => 'plan_id',
                'title' => _t('plan'),
                'type' => 'text'
            ],
            [
                'name' => 'creator_id',
                'title' => _t('creator'),
                'type' => 'text'
            ],
            [
                'name' => 'number',
                'title' => _t('number'),
                'type' => 'number'
            ],
            [
                'name' => 'tran_id',
                'title' => _t('tran_id'),
                'type' => 'text'
            ],
            [
                'name' => 'network',
                'title' => _t('network'),
                'type' => 'text'
            ],
            [
                'name' => 'currency',
                'title' => _t('currency'),
                'type' => 'text'
            ],
            [
                'name' => 'amount',
                'title' => _t('amount'),
                'type' => 'text'
            ],
            [
                'name' => 'description',
                'title' => _t('description'),
                'type' => 'text'
            ],
            [
                'name' => 'payed_at',
                'title' => _t('payed_at'),
                'type' => 'text'
            ],
            [
                'name' => 'confirm_at',
                'title' => _t('confirm_at'),
                'type' => 'text'
            ],
            [
                'name' => 'expired_at',
                'title' => _t('expired_at'),
                'type' => 'text'
            ],
        ];
        return [$filters, [], $operators];
    }

}
