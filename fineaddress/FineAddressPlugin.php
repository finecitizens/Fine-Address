<?php
namespace Craft;

class FineAddressPlugin extends BasePlugin
{
    function getName()
    {
         return Craft::t('Fine Address');
    }

    function getVersion()
    {
        return '0.0.1';
    }

    function getDeveloper()
    {
        return 'Fine Citizens';
    }

    function getDeveloperUrl()
    {
        return 'http://finecitizens.com';
    }
    protected function defineSettings()
    {
        return array(
            'defaultAddress1' => array(AttributeType::String, 'default' => ''),
            'defaultAddress2' => array(AttributeType::String, 'default' => ''),
            'defaultCity' => array(AttributeType::String, 'default' => ''),
            'defaultState' => array(AttributeType::String, 'default' => ''),
            'defaultZip' => array(AttributeType::String, 'default' => ''),
            'defaultLat' => array(AttributeType::String, 'default' => ''),
            'defaultLng' => array(AttributeType::String, 'default' => '')
        );
    }
    public function getSettingsHtml()
    {
        $settings = $this->getSettings();
        $address1 = (isset($settings->defaultAddress1) ? $settings->defaultAddress1 : '');
        $address2 = (isset($settings->defaultAddress2) ? $settings->defaultAddress2 : '');
        $city = (isset($settings->defaultCity) ? $settings->defaultCity : '');
        $state = (isset($settings->defaultState) ? $settings->defaultState : '');
        $zip = (isset($settings->defaultZip) ? $settings->defaultZip : '');
        $lat = (isset($settings->defaultLat) ? $settings->defaultLat : '');
        $lng = (isset($settings->defaultLng) ? $settings->defaultLng : '');
        return craft()->templates->render('fineaddress/settings', array(
            'address1' => $address1,
            'address2' => $address2,
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
            'lat' => $lat,
            'lng' => $lng
        ));
    }
}
