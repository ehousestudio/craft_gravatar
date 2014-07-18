<?php
namespace Craft;

class GravatarPlugin extends BasePlugin
{
    function getName()
    {
         return Craft::t('Gravatar');
    }

    function getVersion()
    {
        return '1.0';
    }

    function getDeveloper()
    {
        return 'eHouse Studio';
    }

    function getDeveloperUrl()
    {
        return 'http://www.ehousestudio.com';
    }
}