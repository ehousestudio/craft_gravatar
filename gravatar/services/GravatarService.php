<?php
namespace Craft;

class GravatarService extends BaseApplicationComponent
{
	/**
	 * Get either a Gravatar URL or complete image tag for a specified email address.
	 *
	 * @param string $email The email address
	 * @param array $criteria The gravatar options
	 * 				['size'] 		Size in pixels, defaults to 80px [ 1 - 2048 ]
	 * 				['default'] 	Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
	 * 				['rating'] 		Maximum rating (inclusive) [ g | pg | r | x ]
	 * 				['attr']		Optional, additional key/value attributes to include in the IMG tag
	 * @param bool $img True to return a complete IMG tag False for just the URL
	 * @return String containing either just a URL or a complete image tag
	 * @source http://gravatar.com/site/implement/images/php/
	 */

	public function get($email, $criteria = array(), $img = false)
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

	/**
	 * Check if an email address has a gravatar image or not.
	 *
	 * @param string $email The email address
	 * @return bool
	 * @source http://gravatar.com/site/implement/images/php/
	 */
	public function exists($email) {

		$url = $this->get($email, array('default' => '404'));

		try {
			$client = new \Guzzle\Http\Client();
			$request = $client->get("http:" . $url);
			$request->send()->getStatusCode();
		} catch (\Guzzle\Http\Exception\ClientErrorResponseException $e) {
			return false;
		}
		return true;
	}
}
