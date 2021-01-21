<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use DateInterval;
use Exception;

class CarbonOffsetMembership extends Model
{
    public function getSchedule(String $startDate, int $months): array
    {
//        echo $date->format('Y-m-d');
//        echo $date->add(new DateInterval('P1M'))->format('Y-m-d');
        $schedules = [];
        for ($i = 1; $i <= $months; $i++) {

            try {
                $date = new DateTime($startDate);
            } catch (Exception $ex) {
                throw $ex;
            }

            $origDay = $date->format("d");
            $date->add(new DateInterval('P' . $i . 'M'));
            $newDay = $date->format("d");

            if ($origDay != $newDay) {
                $date->sub(new DateInterval('P' . $newDay . 'D'));
            }

            $schedules[] = $date->format('Y-m-d');

        }

        return $schedules;
    }
}
