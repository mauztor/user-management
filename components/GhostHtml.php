<?php
namespace mauztor\modules\UserManagement\components;

use yii\helpers\Html;
use yii\web\User;
/**
 * @var $this yii\web\View
 */


/**
 * Class GhostHtml
 *
 * Show elements only to those, who can access to them
 *
 * @package mauztor\modules\UserManagement\components
 */
class GhostHtml extends Html
{
	/**
	 * Hide link if user hasn't access to it
	 *
	 * @inheritdoc
	 */
	public static function a($text, $url = null, $options = [])
	{
		if ( in_array($url, [null, '', '#']) )
		{
			return parent::a($text, $url, $options);
		}

		return User::canRoute($url) ? parent::a($text, $url, $options) : '';
	}
}