<?php
namespace Craft;

class GravatarService extends BaseApplicationComponent
{
	/**
	 * Get either a Gravatar URL or complete image tag for a specified email address.
	 *
	 * @param string $email The email address
	 * @param string $size Size in pixels, defaults to 80px [ 1 - 2048 ]
	 * @param string $default Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
	 * @param string $rating Maximum rating (inclusive) [ g | pg | r | x ]
	 * @param boole $img True to return a complete IMG tag False for just the URL
	 * @param array $attr Optional, additional key/value attributes to include in the IMG tag
	 * @return String containing either just a URL or a complete image tag
	 * @source http://gravatar.com/site/implement/images/php/
	 */

	public function get($email, $criteria, $img)
	{


		if (isset($criteria['size'])) {
			$size = $criteria['size'];
		} else {
			$size = 80;
		}

		if (isset($criteria['default'])) {
			$default = $criteria['default'];
		} else {
			$default = 'mm';
		}

		if (isset($criteria['rating'])) {
			$rating = $criteria['rating'];
		} else {
			$rating = 'g';
		}

		$url = '//www.gravatar.com/avatar/';
		$url .= md5( strtolower( trim( $email ) ) );
		$url .= "?s=$size&d=$default&r=$rating";

		if ($img) {
		    $url = '<img src="' . $url . '"';
		    if (isset($criteria['attr'])) {
			    foreach ($criteria['attr'] as $key => $val) {
					$url .= ' ' . $key . '="' . $val . '"';
				}
		    }
		    $url .= ' />';
		}

		return TemplateHelper::getRaw($url);
	}
}
