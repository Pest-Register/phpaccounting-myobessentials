<?php


namespace PHPAccounting\MyobEssentials\Helpers;


class BuildEndpointHelper
{
    public static function loadByGUID($endpoint, $guid, $filterPrefix='', $filter ='') {
        $prefix = '?';
        $endpoint = $endpoint.'/'.$guid.$prefix.$filterPrefix.'='.$filter;
        return $endpoint;
    }

    public static function paginate($endpoint, $page) {
        $prefix = '?';
        $endpoint = $endpoint.$prefix."page=".$page;
        return $endpoint;
    }
}