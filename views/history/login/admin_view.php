<?php
/**
 * User History Logins (user-history-login)
 * @var $this app\components\View
 * @var $this ommu\users\controllers\history\LoginController
 * @var $model ommu\users\models\UserHistoryLogin
 *
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 OMMU (www.ommu.id)
 * @created date 5 May 2018, 02:17 WIB
 * @modified date 13 November 2018, 01:16 WIB
 * @link https://github.com/ommu/mod-users
 *
 */

use yii\helpers\Url;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'History Logins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->user->displayname;

if (!$small) {
    $this->params['menu']['content'] = [
        ['label' => Yii::t('app', 'Delete'), 'url' => Url::to(['delete', 'id' => $model->id]), 'htmlOptions' => ['data-confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'data-method' => 'post', 'class' => 'btn btn-danger'], 'icon' => 'trash'],
    ];
} ?>

<div class="user-history-login-view">

<?php
$attributes = [
    'id',
    [
        'attribute' => 'userLevel',
        'value' => isset($model->user) ? $model->user->level->title->message : '-',
    ],
    [
        'attribute' => 'userDisplayname',
        'value' => isset($model->user) ? $model->user->displayname : '-',
    ],
    [
        'attribute' => 'email_search',
        'value' => isset($model->user) ? Yii::$app->formatter->asEmail($model->user->email) : '-',
        'format' => 'html',
    ],
    [
        'attribute' => 'lastlogin_date',
        'value' => Yii::$app->formatter->asDatetime($model->lastlogin_date, 'medium'),
    ],
    'lastlogin_ip',
    'lastlogin_from',
];

echo DetailView::widget([
	'model' => $model,
	'options' => [
		'class' => 'table table-striped detail-view',
	],
	'attributes' => $attributes,
]); ?>

</div>