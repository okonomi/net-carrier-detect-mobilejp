<?php

require_once 'Net/Carrier/Detect/MobileJp.php';


class Net_Carrier_Detect_MobileJpTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
    }

    public function testDetect()
    {
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

            'airh"'    => 'willcom',
            'air-edge' => 'willcom',
            'willcom'  => 'willcom',

            'em'      => 'emobile',
            'emobile' => 'emobile',
        );

        foreach ($expected as $value => $expect) {
            try {
                $this->assertEquals(
                    $expect,
                    Net_Carrier_Detect_MobileJp::detect($value));
            } catch (PHPUnit_Framework_ExpectationFailedException $e) {
                echo "fail: value=$value, expect=$expect", PHP_EOL;
                throw $e;
            }
        }
    }

    public function testChangeDetectValues()
    {
        $detect_values = array(
            Net_Carrier_Detect_MobileJp::MOBILE_NONMOBILE => 'a',
            Net_Carrier_Detect_MobileJp::MOBILE_DOCOMO    => 'b',
        );
        $expected = array(
            'foo'      => 'a',
            'docomo'   => 'b',
            'softbank' => 'softbank',
            'au'       => 'au',
            'willcom'  => 'willcom',
            'emobile'  => 'emobile',
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
