<?php
namespace Craft;
/**
 * Gravatar Plugin
 */
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
        return 'Ryan Shrum';
    }

    function getDeveloperUrl()
    {
        return 'http://www.ryanshrum.com';
    }
}