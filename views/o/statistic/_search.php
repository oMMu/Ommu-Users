<?php
/**
 * User Statistic Totals (user-statistic-total)
 * @var $this StatisticController
 * @var $model UserStatisticTotal
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2015 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Users
 * @contect (+62)856-299-4114
 *
 */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<ul>
		<li>
			<?php echo $model->getAttributeLabel('statistic_key'); ?><br/>
			<?php echo $form->textField($model,'statistic_key',array('size'=>32,'maxlength'=>32)); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('total'); ?><br/>
			<?php echo $form->textField($model,'total'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('flag'); ?><br/>
			<?php echo $form->textField($model,'flag'); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('note'); ?><br/>
			<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>64)); ?>
		</li>

		<li class="submit">
			<?php echo CHtml::submitButton(Yii::t('phrase', 'Search')); ?>
		</li>
	</ul>
<?php $this->endWidget(); ?>
