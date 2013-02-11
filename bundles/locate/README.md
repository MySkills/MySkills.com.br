Locate
======

Locate is a Laravel bundle for easily accessing visitor geolocation data.

Install via Artisan
-------
    php artisan bundle:install locate
Add the following to your application/bundles.php array:

    'locate' => array('auto' => true),


Configuration
-------
*   Open /bundles/locate/config/options.php
*   You can manage the **refresh rate**, **service priority**, **service API information**, and **fallback details**

Usage
-------
Simply call Locate::get() with one of the available values and the data will be returned. Locate stores the geolocation data within your session and only updates if you manually call **Locate::refresh()** or the **refresh_rate** in config/options.php is met.

    echo 'Service Used: ' . Locate::get('service') . "\n";
    echo 'Timestamp: ' . Locate::get('timestamp') . "\n";
    echo 'IP: ' . Locate::get('ip') . "\n";
    echo 'City: ' . Locate::get('city') . "\n";
    echo 'State: ' . Locate::get('state') . "\n";
    echo 'State Acronym: ' . Locate::get('state_code') . "\n";
    echo 'Country: ' . Locate::get('country') . "\n";
    echo 'Country Acronym: ' . Locate::get('country_code') . "\n";
    echo 'Zipcode: ' . Locate::get('zipcode') . "\n";
    echo 'Latitude: ' . Locate::get('lat') . "\n";
    echo 'Longitude: ' . Locate::get('lng') . "\n";

Manually update location data:

    Locate::refresh();

Services Currently Supported
-------
*   **IPInfoDB** - Requires API key: http://ipinfodb.com/register.php
*   **FreeGeoIP**
*   _... more on the way_