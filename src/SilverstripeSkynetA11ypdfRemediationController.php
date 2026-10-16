<?php

namespace Skynettechnologies\SilverstripeSkynetA11ypdfRemediation;

use SilverStripe\Core\Config\Config;

use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;

class SilverstripeSkynetA11ypdfRemediationController extends Controller
{
    private static $current_site_config = null;

    private static $allowed_actions = [
        'index',
    ];

    private static $url_handlers = [
        'fetchskyneta11ypdfremediation' => 'index',
    ];

    public function index(HTTPRequest $request)
    {
        
        $this->getResponse()->setBody(json_encode([
            
        ]));

        $this->getResponse()->addHeader("Content-type", "application/json");
       
        return $this->getResponse();
    }


    public static function set_current_site_config($input)
    {
        self::$current_site_config = $input;
    }
}
