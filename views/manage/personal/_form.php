<?php
/**
 * Users (users)
 * @var $this yii\web\View
 * @var $this ommu\users\controllers\manage\PersonalController
 * @var $model ommu\users\models\Users
 * @var $form yii\widgets\ActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 Ommu Platform (www.ommu.co)
 * @created date 15 November 2018, 07:04 WIB
 * @modified date 15 November 2018, 07:04 WIB
 * @modified by Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @link https://github.com/ommu/mod-users
 *
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use ommu\users\models\Users;
use ommu\users\models\UserLevel;
use app\models\CoreLanguages;
?>

<div class="users-form">

<?php $form = ActiveForm::begin([
	'options' => [
		'class' => 'form-horizontal form-label-left',
		'enctype' => 'multipart/form-data',
	],
	'enableClientValidation' => false,
	'enableAjaxValidation' => false,
	//'enableClientScript' => true,
]); ?>

<?php //echo $form->errorSummary($model);?>

<?php 
$controller = strtolower(Yii::$app->controller->id);
$level = UserLevel::getLevel($controller == 'manage/admin' ? 'admin' : 'member');
if(count($level) == 1) {
	$model->level_id = key($level);
	echo $form->field($model, 'level_id')->hiddenInput()->label(false);
} else {
	echo $form->field($model, 'level_id', ['template' => '{label}<div class="col-md-6 col-sm-9 col-xs-12">{input}{error}</div>'])
		->dropDownList($level, ['prompt'=>''])
		->label($model->getAttributeLabel('level_id'), ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']);
} ?>

<?php echo $form->field($model, 'email', ['template' => '{label}<div class="col-md-6 col-sm-9 col-xs-12">{input}{error}</div>'])
	->textInput(['type'=>'email'])
	->label($model->getAttributeLabel('email'), ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']); ?>

<?php echo $form->field($model, 'first_name', ['template' => '{label}<div class="col-md-6 col-sm-9 col-xs-12">{input}{error}</div>'])
	->textInput(['maxlength'=>true])
	->label($model->getAttributeLabel('first_name'), ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']); ?>

<?php echo $form->field($model, 'last_name', ['template' => '{label}<div class="col-md-6 col-sm-9 col-xs-12">{input}{error}</div>'])
	->textInput(['maxlength'=>true])
	->label($model->getAttributeLabel('last_name'), ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']); ?>

<?php if(($model->isNewRecord && $setting->signup_random == 0) || !$model->isNewRecord) {
if(!$model->isNewRecord && !$model->getErrors())
	$model->password = '';
echo $form->field($model, 'password', ['template' => '{label}<div class="col-md-6 col-sm-9 col-xs-12">{input}{error}</div>'])
	->passwordInput(['maxlength'=>true])
	->label($model->getAttributeLabel('password'), ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']);
} ?>

<?php if(!$model->isNewRecord) {
echo $form->field($model, 'confirm_password_i', ['template' => '{label}<div class="col-md-6 col-sm-9 col-xs-12">{input}{error}</div>'])
	->passwordInput(['maxlength'=>true])
	->label($model->getAttributeLabel('confirm_password_i'), ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']);
} ?>

<?php if(($model->isNewRecord && $setting->signup_approve == 0) || !$model->isNewRecord) {
$enabled = Users::getEnabled();
echo $form->field($model, 'enabled', ['template' => '{label}<div class="col-md-6 col-sm-9 col-xs-12">{input}{error}</div>'])
	->dropDownList($enabled, ['prompt'=>''])
	->label($model->getAttributeLabel('enabled'), ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']);
} ?>

<?php if(($model->isNewRecord && $setting->signup_verifyemail == 1) || !$model->isNewRecord) {
echo $form->field($model, 'verified', ['template' => '{label}<div class="col-md-6 col-sm-9 col-xs-12 checkbox">{input}{error}</div>'])
	->checkbox(['label'=>''])
	->label($model->getAttributeLabel('verified'), ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']);
} ?>

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-9 col-xs-12 col-sm-offset-3">
		<?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
	</div>
</div>

<?php ActiveForm::end(); ?>

</div>