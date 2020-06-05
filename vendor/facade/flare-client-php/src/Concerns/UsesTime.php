<?php

namespace Facade\FlareClient\Concerns;

use Facade\FlareClient\Time\Time;
use Facade\FlareClient\Time\SystemTime;

trait UsesTime
{
    /** @var \Facade\FlareClient\Time\Time */
    public static $time;

    public static function useTime(Time $time)
    {
        self::$time = $time;
    }

    public function getCurrentTime(): int
    {
        $time = self::$time ?? new SystemTime();

        return $time->getCurrentTime();
    }
}
