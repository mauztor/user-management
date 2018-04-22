<?php

use mauztor\modules\UserManagement\components\GhostHtml;
use mauztor\modules\UserManagement\models\rbacDB\AuthItemGroup;
use mauztor\modules\UserManagement\models\rbacDB\Permission;
use mauztor\modules\UserManagement\models\rbacDB\search\PermissionSearch;
use mauztor\modules\UserManagement\UserManagementModule;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

/**
 * @var ActiveDataProvider $dataProvider
 * @var PermissionSearch $searchModel
 * @var View $this
 */
$this->title = UserManagementModule::t('back', 'Permissions');
$this->params['breadcrumbs'][] = $this->title;
?>

<h2 class="lte-hide-title"><?= $this->title ?></h2>

<div class="panel panel-default">
    <div class="panel-body">
        <p>
            <?=
            GhostHtml::a(
                    '<span class="glyphicon glyphicon-plus-sign"></span> ' . UserManagementModule::t('back', 'Create'), ['create'], ['class' => 'btn btn-success']
            )
            ?>
        </p>
        <?php
        Pjax::begin([
            'id' => 'permission-grid-pjax',
        ])
        ?>

        <?=
        GridView::widget([
            'id' => 'permission-grid',
            'dataProvider' => $dataProvider,
            'pager' => [
                'options' => ['class' => 'pagination pagination-sm'],
                'hideOnSinglePage' => true,
                'lastPageLabel' => '>>',
                'firstPageLabel' => '<<',
            ],
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn', 'options' => ['style' => 'width:10px']],
                [
                    'attribute' => 'description',
                    'value' => function($model) {
                        if ($model->name == Yii::$app->getModule('user-management')->commonPermissionName) {
                            return Html::a(
                                            $model->description, ['view', 'id' => $model->name], ['data-pjax' => 0, 'class' => 'label label-primary']
                            );
                        } else {
                            return Html::a($model->description, ['view', 'id' => $model->name], ['data-pjax' => 0]);
                        }
                    },
                    'format' => 'raw',
                ],
                'name',
                [
                    'attribute' => 'group_code',
                    'filter' => ArrayHelper::map(AuthItemGroup::find()->asArray()->all(), 'code', 'name'),
                    'value' => function(Permission $model) {
                        return $model->group_code ? $model->group->name : '';
                    },
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'width:70px; text-align:center;'],
                ],
            ],
        ]);
        ?>

        <?php Pjax::end() ?>
    </div>
</div>