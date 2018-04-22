<?php

use mauztor\modules\UserManagement\models\search\UserVisitLogSearch;
use mauztor\modules\UserManagement\UserManagementModule;
use webvimark\extensions\DateRangePicker\DateRangePicker;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

/**
 * @var View $this
 * @var ActiveDataProvider $dataProvider
 * @var UserVisitLogSearch $searchModel
 */
$this->title = UserManagementModule::t('back', 'Visit log');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-visit-log-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <div class="panel panel-default">

        <div class="panel-body">


            <?php
            Pjax::begin([
                'id' => 'user-visit-log-grid-pjax',
            ])
            ?>

            <?=
            GridView::widget([
                'id' => 'user-visit-log-grid',
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
                        'attribute' => 'user_id',
                        'value' => function($model) {
                            return Html::a(@$model->user->username, ['view', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                        'format' => 'raw',
                    ],
                    'language',
                    'os',
                    'browser',
                    array(
                        'attribute' => 'ip',
                        'value' => function($model) {
                            return Html::a($model->ip, "http://ipinfo.io/" . $model->ip, ["target" => "_blank"]);
                        },
                        'format' => 'raw',
                    ),
                    'visit_time:datetime',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view}',
                        'contentOptions' => ['style' => 'width:70px; text-align:center;'],
                    ],
                ],
            ]);
            ?>

<?php Pjax::end() ?>
        </div>
    </div>
</div>

<?php
DateRangePicker::widget([
    'model' => $searchModel,
    'attribute' => 'visit_time',
])
?>