<?php

require_once 'Net/Carrier/Detect/MobileJp.php';


class Net_Carrier_Detect_MobileJpTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
    }

    public function testDetect()
    {
        $detect_values = array(
            Net_Carrier_Detect_MobileJp::MOBILE_NONMOBILE => 'nonmobile',
            Net_Carrier_Detect_MobileJp::MOBILE_DOCOMO    => 'docomo',
            Net_Carrier_Detect_MobileJp::MOBILE_SOFTBANK  => 'softbank',
            Net_Carrier_Detect_MobileJp::MOBILE_AU        => 'au',
        );
        $expected = array(
            'i'      => 'docomo',
            'I'      => 'docomo',
            'Imode'  => 'docomo',
            'i-mode' => 'docomo',
            'iMode'  => 'docomo',
            'docomo' => 'docomo',

            'v'        => 'softbank',
            's'        => 'softbank',
            'vodafone' => 'softbank',
            'softbank' => 'softbank',
            'sb'       => 'softbank',
            'j'        => 'softbank',
            'jphone'   => 'softbank',

            'ez'    => 'au',
            'ezweb' => 'au',
            'au'    => 'au',
            'kddi'  => 'au',
            'Ezweb' => 'au',
        );

        foreach ($expected as $value => $expect) {
            try {
                $this->assertEquals(
                    $expect,
                    Net_Carrier_Detect_MobileJp::detect($value, $detect_values));
            } catch (PHPUnit_Framework_ExpectationFailedException $e) {
                echo "fail: value=$value, expect=$expect", PHP_EOL;
                throw $e;
            }
        }
    }
}
