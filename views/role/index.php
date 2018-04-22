<?php

use mauztor\modules\UserManagement\components\GhostHtml;
use mauztor\modules\UserManagement\models\rbacDB\Role;
use mauztor\modules\UserManagement\models\rbacDB\search\RoleSearch;
use mauztor\modules\UserManagement\UserManagementModule;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

/**
 * @var ActiveDataProvider $dataProvider
 * @var RoleSearch $searchModel
 * @var View $this
 */
$this->title = UserManagementModule::t('back', 'Roles');
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
            'id' => 'role-grid-pjax',
        ])
        ?>

        <?=
        GridView::widget([
            'id' => 'role-grid',
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
                    'value' => function(Role $model) {
                        return Html::a($model->description, ['view', 'id' => $model->name], ['data-pjax' => 0]);
                    },
                    'format' => 'raw',
                ],
                'name',
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