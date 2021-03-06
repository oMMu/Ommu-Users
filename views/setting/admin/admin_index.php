<?php
/**
 * User Settings (user-setting)
 * @var $this app\components\View
 * @var $this ommu\users\controllers\setting\AdminController
 * @var $model ommu\users\models\UserSetting
 * @var $form yii\widgets\ActiveForm
 *
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2017 OMMU (www.ommu.id)
 * @created date 9 October 2017, 11:22 WIB
 * @modified date 9 November 2018, 07:13 WIB
 * @link https://github.com/ommu/mod-users
 *
 */

use yii\helpers\Html;
use yii\helpers\Url;
use app\components\grid\GridView;
use yii\widgets\Pjax;
use app\components\widgets\MenuContent;
use app\components\widgets\MenuOption;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = Yii::t('app', 'User Settings');

$this->params['menu']['content'] = [
	['label' => Yii::t('app', 'Add Level'), 'url' => Url::to(['setting/level/create']), 'icon' => 'plus-square', 'htmlOptions' => ['class' => 'btn btn-primary modal-btn']],
];
$this->params['menu']['option'] = [
	//['label' => Yii::t('app', 'Search'), 'url' => 'javascript:void(0);'],
	['label' => Yii::t('app', 'Grid Option'), 'url' => 'javascript:void(0);'],
];
?>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<?php if ($this->params['menu']['content']) {
				    echo MenuContent::widget(['items' => $this->params['menu']['content']]);
                }?>
				<ul class="nav navbar-right panel_toolbox">
					<li><a href="#" title="<?php echo Yii::t('app', 'Toggle');?>" class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					<?php if ($this->params['menu']['option']) {?>
					<li class="dropdown">
						<a href="#" title="<?php echo Yii::t('app', 'Options');?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<?php echo MenuOption::widget(['items' => $this->params['menu']['option']]);?>
					</li>
                    <?php } ?>
					<li><a href="#" title="<?php echo Yii::t('app', 'Close');?>" class="close-link"><i class="fa fa-close"></i></a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
<?php Pjax::begin(); ?>

<?php //echo $this->render('/setting/level/_search', ['model' => $searchModel]); ?>

<?php echo $this->render('/setting/level/_option_form', ['model' => $searchModel, 'gridColumns' => $searchModel->activeDefaultColumns($columns), 'route' => $this->context->route]); ?>

<?php
$columnData = $columns;
array_push($columnData, [
	'class' => 'app\components\grid\ActionColumn',
	'header' => Yii::t('app', 'Option'),
	'urlCreator' => function($action, $model, $key, $index) {
        if ($action == 'view') {
            return Url::to(['setting/level/view', 'id' => $key]);
        }
        if ($action == 'update') {
            return Url::to(['setting/level/update', 'id' => $key]);
        }
        if ($action == 'delete') {
            return Url::to(['setting/level/delete', 'id' => $key]);
        }
	},
	'buttons' => [
		'view' => function ($url, $model, $key) {
			return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => Yii::t('app', 'Detail'), 'data-pjax' => 0]);
		},
		'update' => function ($url, $model, $key) {
			return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => Yii::t('app', 'Update'), 'data-pjax' => 0]);
		},
		'delete' => function ($url, $model, $key) {
			return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
				'title' => Yii::t('app', 'Delete'),
				'data-confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
				'data-method'  => 'post',
			]);
		},
	],
	'template' => '{view} {update} {delete}',
]);

echo GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => $columnData,
]); ?>

<?php Pjax::end(); ?>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo \app\components\widgets\Alert::widget(['closeButton' => false]); ?>

		<div class="x_panel">
			<div class="x_title">
				<ul class="nav navbar-right panel_toolbox">
					<li><a href="#" title="<?php echo Yii::t('app', 'Toggle');?>" class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					<li><a href="#" title="<?php echo Yii::t('app', 'Close');?>" class="close-link"><i class="fa fa-close"></i></a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
<div class="user-level-index">
<?php if (!$model->isNewRecord) {
	echo DetailView::widget([
		'model' => $model,
		'options' => [
			'class' => 'table table-striped detail-view',
		],
		'attributes' => [
			'id',
			'license',
			[
				'attribute' => 'permission',
				'value' => $model::getPermission($model->permission),
			],
			[
				'attribute' => 'meta_description',
				'value' => $model->meta_description ? $model->meta_description : '-',
			],
			[
				'attribute' => 'meta_keyword',
				'value' => $model->meta_keyword ? $model->meta_keyword : '-',
			],
			[
				'attribute' => 'forgot_difference',
				'value' => $model->forgot_difference.' '.$model::getForgotDiffType($model->forgot_diff_type),
			],
			[
				'attribute' => 'verify_difference',
				'value' => $model->verify_difference.' '.$model::getForgotDiffType($model->verify_diff_type),
			],
			[
				'attribute' => 'invite_difference',
				'value' => $model->invite_difference.' '.$model::getForgotDiffType($model->invite_diff_type),
			],
			[
				'attribute' => 'invite_order',
				'value' => $model::getInviteOrder($model->invite_order),
			],
			[
				'attribute' => 'modified_date',
				'value' => Yii::$app->formatter->asDatetime($model->modified_date, 'medium'),
			],
			[
				'attribute' => 'modifiedDisplayname',
				'value' => isset($model->modified) ? $model->modified->displayname : '-',
			],
			[
				'attribute' => '',
				'value' => Html::a(Yii::t('app', 'Update'), Url::to(['update']), [
					'class' => 'btn btn-primary',
				]),
				'format' => 'raw',
			],
		],
	]);
} else {
	echo $this->render('_form', [
		'model' => $model,
	]);
}?>
</div>
			</div>
		</div>
	</div>
</div>