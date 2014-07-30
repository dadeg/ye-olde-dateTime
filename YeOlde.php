<?php

namespace Britain;

class YeOldeDateTime extends \DateTime
{
    public function format($format = "ye_olde")
    {
        switch ($format) {
            case "ye_olde":
                return "thee " . $this->ordinal($this->format('Y')) . " year of thy King";
            break;
            default:
                return parent::format($format);
            break;
        }
        
        
    }

    private function ordinal($num) {
        $ones = $num % 10;
        $tens = floor($num / 10) % 10;
        if ($tens == 1) {
            $suff = "th";
        } else {
            switch ($ones) {
                case 1 : $suff = "st"; break;
                case 2 : $suff = "nd"; break;
                case 3 : $suff = "rd"; break;
                default : $suff = "th";
            }
        }
        return $num . $suff;
    }

}

// example:
$thineDate = new YeOldeDateTime("today");
print_r($thineDate->format());
