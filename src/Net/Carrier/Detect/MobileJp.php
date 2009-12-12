<?php


class Net_Carrier_Detect_MobileJp
{
    const MOBILE_NONMOBILE = 0;
    const MOBILE_DOCOMO    = 1;
    const MOBILE_SOFTBANK  = 2;
    const MOBILE_AU        = 3;

    private static $_detect_value = array(
        self::MOBILE_NONMOBILE => 'nonmobile',
        self::MOBILE_DOCOMO    => 'docomo',
        self::MOBILE_SOFTBANK  => 'softbank',
        self::MOBILE_AU        => 'au',
    );


    static function detect($str, $return_val = array())
    {
        $return_val = array_merge(
            self::$_detect_value,
            $return_val
        );


        switch (strtolower($str)) {
        case 'docomo':
        case 'imode':
        case 'i-mode':
            return $return_val[self::MOBILE_DOCOMO];

        case 'ezweb':
        case 'au':
        case 'kddi':
            return $return_val[self::MOBILE_SOFTBANK];

        case 'disney':
        case 'softbank':
        case 'vodafone':
        case 'jphone':
        case 'j-phone':
            return $return_val[self::MOBILE_AU];

        default:
            return $return_val[self::MOBILE_NONMOBILE];
        }
    }

    static function getDefaultDetectValues()
    {
        return self::$_detect_value;
    }
}
