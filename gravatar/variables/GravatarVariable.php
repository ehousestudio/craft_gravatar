<?php
namespace Craft;

class GravatarVariable
{
	public function url($email, $criteria = array())
	{
		return craft()->gravatar->get($email, $criteria, false);
	}

	public function img($email, $criteria = array())
	{
		return craft()->gravatar->get($email, $criteria, true);
	}
}