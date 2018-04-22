<?php

use mauztor\modules\UserManagement\models\rbacDB\AuthItemGroup;
use mauztor\modules\UserManagement\UserManagementModule;
use yii\web\View;

/**
 * @var View $this
 * @var AuthItemGroup $model
 */

$this->title = UserManagementModule::t('back', 'Creating permission group');
$this->params['breadcrumbs'][] = ['label' => UserManagementModule::t('back', 'Permission groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-group-create">

	<h2 class="lte-hide-title"><?= $this->title ?></h2>

	<div class="panel panel-default">
		<div class="panel-body">

			<?= $this->render('_form', compact('model')) ?>
		</div>
	</div>

</div>
