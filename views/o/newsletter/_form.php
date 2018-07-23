<?php
/**
 * User Newsletter (user-newsletter)
 * @var $this NewsletterController
 * @var $model UserNewsletter
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2012 Ommu Platform (www.ommu.co)
 * @link https://github.com/ommu/mod-users
 *
 */
?>

<?php $form=$this->beginWidget('application.libraries.yii-traits.system.OActiveForm', array( 
	'id'=>'support-newsletter-form', 
	'enableAjaxValidation'=>true, 
	//'htmlOptions' => array('enctype' => 'multipart/form-data') 
)); ?>
<div class="dialog-content">
	<fieldset>
		<div class="form-group row">
			<label class="col-form-label col-lg-4 col-md-3 col-sm-12"><?php echo $model->getAttributeLabel('email_i');?> <span class="required">*</span></label>
			<div class="col-lg-8 col-md-9 col-sm-12">
				<?php echo $form->textArea($model,'email_i', array('rows'=>6, 'cols'=>50, 'class'=>'form-control smaller')); ?>
				<?php echo $form->error($model,'email_i'); ?>
			</div>
		</div>
		
		<div class="form-group row publish">
			<?php echo $form->labelEx($model,'multiple_email_i', array('class'=>'col-form-label col-lg-4 col-md-3 col-sm-12')); ?>
			<div class="col-lg-8 col-md-9 col-sm-12">
				<?php echo $form->checkBox($model,'multiple_email_i', array('class'=>'form-control')); ?>
				<?php echo $form->labelEx($model, 'multiple_email_i'); ?>
				<?php echo $form->error($model,'multiple_email_i'); ?>
			</div>
		</div>
		
		<?php $model->unsubscribe_i = 0;
		echo $form->hiddenField($model,'unsubscribe_i');?>

	</fieldset>
</div>
<div class="dialog-submit">
	<?php echo CHtml::submitButton(Yii::t('phrase', 'Subscribe'), array('onclick' => 'setEnableSave()')); ?>
	<?php echo CHtml::button(Yii::t('phrase', 'Close'), array('id'=>'closed')); ?>
</div>

<?php $this->endWidget(); ?>