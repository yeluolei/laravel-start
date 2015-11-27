<?php
/**
 * @author yerurui
 * Date: 10/29/15
 * Time: 2:47 PM
 */

namespace App\Utils;

use Ramsey\Uuid\Uuid;

class UuidUtil {

    /**
     * 获取Uuid
     * @return string
     */
    public static function getUuid() {
        $uuid1 = Uuid::uuid1();
        return $uuid1->toString();
    }
}