<?php
namespace Craft;
/**
 * 
 * @plugin	Gravatar 1.0
 * @author	@ryanshrum
 *
 */
class GravatarVariable
{
	public function url($email, $criteria)
	{
		return craft()->gravatar->get($email, $criteria, false);
	}
	
	public function img($email, $criteria)
	{
		return craft()->gravatar->get($email, $criteria, true);
	}	
}