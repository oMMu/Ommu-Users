<?php
/**
 * UserInviteHistory
 * 
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2017 ECC UGM (ecc.ft.ugm.ac.id)
 * @created date 23 October 2017, 09:38 WIB
 * @modified date 2 May 2018, 13:17 WIB
 * @link https://ecc.ft.ugm.ac.id
 *
 * This is the model class for table "_user_invite_history".
 *
 * The followings are the available columns in table "_user_invite_history":
 * @property integer $id
 * @property integer $expired
 * @property integer $invite_id
 * @property integer $verify_day_left
 * @property integer $verify_hour_left
 *
 */

namespace app\modules\user\models\view;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;

class UserInviteHistory extends \app\components\ActiveRecord
{
	public $gridForbiddenColumn = [];

	/**
	 * @return string the associated database table name
	 */
	public static function tableName()
	{
		return '_user_invite_history';
	}

	/**
	 * @return string the primarykey column
	 */
	public static function primaryKey()
	{
		return ['id'];
	}

	/**
	 * @return \yii\db\Connection the database connection used by this AR class.
	 */
	public static function getDb()
	{
		return Yii::$app->get('ecc4');
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return [
			[['invite_id'], 'required'],
			[['id', 'expired', 'invite_id', 'verify_day_left', 'verify_hour_left'], 'integer'],
		];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app', 'ID'),
			'expired' => Yii::t('app', 'Expired'),
			'invite_id' => Yii::t('app', 'Invite'),
			'verify_day_left' => Yii::t('app', 'Verify Day Left'),
			'verify_hour_left' => Yii::t('app', 'Verify Hour Left'),
		];
	}

	/**
	 * Set default columns to display
	 */
	public function init() 
	{
		parent::init();

		$this->templateColumns['_no'] = [
			'header' => Yii::t('app', 'No'),
			'class'  => 'yii\grid\SerialColumn',
			'contentOptions' => ['class'=>'center'],
		];
		$this->templateColumns['id'] = [
			'attribute' => 'id',
			'value' => function($model, $key, $index, $column) {
				return $model->id;
			},
		];
		$this->templateColumns['expired'] = [
			'attribute' => 'expired',
			'value' => function($model, $key, $index, $column) {
				return $model->expired;
			},
		];
		$this->templateColumns['invite_id'] = [
			'attribute' => 'invite_id',
			'value' => function($model, $key, $index, $column) {
				return $model->invite_id;
			},
		];
		$this->templateColumns['verify_day_left'] = [
			'attribute' => 'verify_day_left',
			'value' => function($model, $key, $index, $column) {
				return $model->verify_day_left;
			},
		];
		$this->templateColumns['verify_hour_left'] = [
			'attribute' => 'verify_hour_left',
			'value' => function($model, $key, $index, $column) {
				return $model->verify_hour_left;
			},
		];
	}

	/**
	 * User get information
	 */
	public static function getInfo($id, $column=null)
	{
		if($column != null) {
			$model = self::find()
				->select([$column])
				->where(['id' => $id])
				->one();
			return $model->$column;
			
		} else {
			$model = self::findOne($id);
			return $model;
		}
	}
}