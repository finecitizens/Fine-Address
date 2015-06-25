<?php
namespace Craft;

class FineAddress_AddressFieldType extends BaseFieldType
{
    public function getName()
    {
        return Craft::t('Address');
    }

    public function getInputHtml($name, $value)
    {
        $settings = craft()->plugins->getPlugin('fineaddress')->getSettings();
        $address1 = (isset($value['address1']) ? $value['address1'] : (isset($settings->defaultAddress1) ? $settings->defaultAddress1 : ''));
        $address2 = (isset($value['address2']) ? $value['address2'] : (isset($settings->defaultAddress1) ? $settings->defaultAddress2 : ''));
        $city = (isset($value['city']) ? $value['city'] : (isset($settings->defaultCity) ? $settings->defaultCity : ''));
        $state = (isset($value['state']) ? $value['state'] : (isset($settings->defaultState) ? $settings->defaultState : ''));
        $zip = (isset($value['zip']) ? $value['zip'] : (isset($settings->defaultZip) ? $settings->defaultZip : ''));
        $lat = (isset($value['lat']) ? $value['lat'] : (isset($settings->defaultLat) ? $settings->defaultLat : ''));
        $lng = (isset($value['lng']) ? $value['lng'] : (isset($settings->defaultLng) ? $settings->defaultLng : ''));

        craft()->templates->includeJsResource('fineaddress/js/generate.js');
        craft()->templates->includeCssResource('fineaddress/css/address.css');
        return craft()->templates->render('fineaddress/addressfield', array(
            'name'  => $name,
            'address1' => $address1,
            'address2' => $address2,
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
            'lat' => $lat,
            'lng' => $lng
        ));
    }
    public function defineContentAttribute()
    {
        return AttributeType::Mixed;
    }
}
