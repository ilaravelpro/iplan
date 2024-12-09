<?php


/*
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 4/17/24, 9:18 AM
 * Copyright (c) 2020-2024. Powered by www.iamir.net
 */

namespace iLaravel\iPlan\iApp\Http\Controllers\API\v1;


class PlanController extends \iLaravel\Core\iApp\Http\Controllers\API\ApiController
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
                'name' => 'title',
                'title' => _t('title'),
                'type' => 'text'
            ],
            [
                'name' => 'price',
                'title' => _t('price'),
                'type' => 'number'
            ],
            [
                'name' => 'summary',
                'title' => _t('summary'),
                'type' => 'text'
            ],
            [
                'name' => 'content',
                'title' => _t('content'),
                'type' => 'text'
            ],
        ];
        return [$filters, [], $operators];
    }

}
