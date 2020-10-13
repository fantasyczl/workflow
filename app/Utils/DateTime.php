<?php
namespace App\Utils;

/**
 * @author      : caozilong@zuoyebang.com
 * @date        : 2020-10-13 11:18
 * @description :
 */
class DateTime
{
    public static function getLocalTimeFromUTC($s)
    {
        $dt = new \DateTime($s, new \DateTimeZone('UTC'));
        $dt->setTimezone(new \DateTimeZone('Asia/Shanghai'));
        return $dt->format('Y-m-d H:i:s');
    }
}