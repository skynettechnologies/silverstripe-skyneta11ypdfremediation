<?php

namespace Skynettechnologies\SilverstripeSkynetA11ypdfRemediation\Admin;

use SilverStripe\Admin\LeftAndMain;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\LiteralField;
use SilverStripe\View\Requirements;

class SkynetA11ypdfRemediationAdmin extends LeftAndMain
{
    private static $menu_title = 'SkynetA11y PDF Remediation';
    private static $url_segment = 'skyneta11ypdfremediation';
    private static $menu_icon_class = 'font-icon-cog';

    protected function init()
    {
        parent::init();

        Requirements::css(
            'skynettechnologies/silverstripe-skyneta11ypdfremediation:client/dist/css/style.css'
        );
        // Requirements::css(
        //     'skynettechnologies/silverstripe-skyneta11ypdfremediation:client/dist/css/cms-menu-icon.css'
        // );
        Requirements::javascript(
            'skynettechnologies/silverstripe-skyneta11ypdfremediation:client/dist/javascript/config.js'
        );
        Requirements::javascript(
            'skynettechnologies/silverstripe-skyneta11ypdfremediation:client/dist/javascript/icons.js'
        );
        Requirements::javascript(
            'skynettechnologies/silverstripe-skyneta11ypdfremediation:client/dist/javascript/account.js'
        );
        Requirements::javascript(
            'skynettechnologies/silverstripe-skyneta11ypdfremediation:client/dist/javascript/api.js'
        );
        Requirements::javascript(
            'skynettechnologies/silverstripe-skyneta11ypdfremediation:client/dist/javascript/app.js'
        );
    }

     public function getEditForm($id = null, $fields = null)
    {
        $file = dirname(__DIR__, 2) . '/templates/setting.php';

        if (!is_file($file) || !is_readable($file)) {
            $html = '<p>PDF remediation UI file not found or unreadable.</p>';
        } else {
            ob_start();

            try {
                include $file;
                $html = ob_get_contents();
            } finally {
                ob_end_clean();
            }

            if ($html === false) {
                $html = '<p>Unable to render PDF remediation UI.</p>';
            }
        }

        $fields = FieldList::create(
            LiteralField::create('CustomUI', $html)
        );

        return Form::create(
            $this,
            'EditForm',
            $fields,
            FieldList::create()
        );
    }
}