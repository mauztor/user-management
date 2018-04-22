<?php

use mauztor\modules\UserManagement\models\User;
use mauztor\modules\UserManagement\UserManagementModule;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var User $user
 */

$this->title = UserManagementModule::t('front', 'E-mail confirmed');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="change-own-password-success">

	<div class="alert alert-success text-center">
		<?= UserManagementModule::t('front', 'E-mail confirmed') ?> - <b><?= $user->email ?></b>

		<?php if ( isset($_GET['returnUrl']) ): ?>
			<br/>
			<br/>
			<b><?= Html::a(UserManagementModule::t('front', 'Continue'), $_GET['returnUrl']) ?></b>
		<?php endif; ?>
	</div>

</div>
