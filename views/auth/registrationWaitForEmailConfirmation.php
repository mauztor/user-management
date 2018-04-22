<?php

use mauztor\modules\UserManagement\models\User;
use mauztor\modules\UserManagement\UserManagementModule;
use yii\web\View;

/**
 * @var View $this
 * @var User $user
 */

$this->title = UserManagementModule::t('front', 'Registration - confirm your e-mail');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-wait-for-confirmation">

	<div class="alert alert-info text-center">
		<?= UserManagementModule::t('front', 'Check your e-mail {email} for instructions to activate account', [
			'email'=>'<b>'. $user->email .'</b>'
		]) ?>
	</div>

</div>
