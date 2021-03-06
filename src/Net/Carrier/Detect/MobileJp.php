<?php


class Net_Carrier_Detect_MobileJp
{
    const MOBILE_NONMOBILE = 0;
    const MOBILE_DOCOMO    = 1;
    const MOBILE_SOFTBANK  = 2;
    const MOBILE_AU        = 3;
    const MOBILE_WILLCOM   = 4;
    const MOBILE_EMOBILE   = 5;


    private static $_detect_value = array(
        self::MOBILE_NONMOBILE => 'nonmobile',
        self::MOBILE_DOCOMO    => 'docomo',
        self::MOBILE_SOFTBANK  => 'softbank',
        self::MOBILE_AU        => 'au',
        self::MOBILE_WILLCOM   => 'willcom',
        self::MOBILE_EMOBILE   => 'emobile',
    );


    static function detect($str, $return_val = array())
    {
        $return_val += self::$_detect_value;


        switch (strtolower($str)) {
        case 'i':
        case 'dc':
        case 'docomo':
        case 'imode':
        case 'i-mode':
            return $return_val[self::MOBILE_DOCOMO];

        case 'v':
        case 's':
        case 'j':
        case 'voda':
        case 'sb':
        case 'disney':
        case 'softbank':
        case 'vodafone':
        case 'jphone':
        case 'j-phone':
            return $return_val[self::MOBILE_SOFTBANK];

        case 'ez':
        case 'ezweb':
        case 'au':
        case 'kddi':
            return $return_val[self::MOBILE_AU];

        case 'airh"':
        case 'air-edge':
        case 'willcom':
            return $return_val[self::MOBILE_WILLCOM];

        case 'em':
        case 'emobile':
            return $return_val[self::MOBILE_EMOBILE];

        default:
            return $return_val[self::MOBILE_NONMOBILE];
        }
    }

    static function getDefaultDetectValues()
    {
        return self::$_detect_value;
    }
}
