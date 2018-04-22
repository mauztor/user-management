<?php

use mauztor\modules\UserManagement\components\GhostHtml;
use mauztor\modules\UserManagement\models\rbacDB\search\AuthItemGroupSearch;
use mauztor\modules\UserManagement\UserManagementModule;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

/**
 * @var View $this
 * @var ActiveDataProvider $dataProvider
 * @var AuthItemGroupSearch $searchModel
 */
$this->title = UserManagementModule::t('back', 'Permission groups');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-group-index">

    <h2 class="lte-hide-title"><?= $this->title ?></h2>

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <div class="panel panel-default">

        <div class="panel-body">
            <p>
                <?=
                GhostHtml::a(
                        '<span class="glyphicon glyphicon-plus-sign"></span> ' . UserManagementModule::t('back', 'Create'), ['create'], ['class' => 'btn btn-success']
                )
                ?>
            </p>
        </div>


        <?php
        Pjax::begin([
            'id' => 'auth-item-group-grid-pjax',
        ])
        ?>

        <?=
        GridView::widget([
            'id' => 'auth-item-group-grid',
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
                    'attribute' => 'name',
                    'value' => function($model) {
                        return Html::a($model->name, ['update', 'id' => $model->code], ['data-pjax' => 0]);
                    },
                    'format' => 'raw',
                ],
                'code',
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
</div>
