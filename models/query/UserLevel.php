<?php
/**
 * UserLevel
 *
 * This is the ActiveQuery class for [[\ommu\users\models\UserLevel]].
 * @see \ommu\users\models\UserLevel
 * 
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 OMMU (www.ommu.id)
 * @created date 2 May 2018, 13:29 WIB
 * @modified date 9 November 2018, 09:06 WIB
 * @link https://github.com/ommu/mod-users
 *
 */

namespace ommu\users\models\query;

class UserLevel extends \yii\db\ActiveQuery
{
	/*
	public function active()
	{
		return $this->andWhere('[[status]]=1');
	}
	*/

	/**
	 * {@inheritdoc}
	 * @return \ommu\users\models\UserLevel[]|array
	 */
	public function all($db = null)
	{
		return parent::all($db);
	}

	/**
	 * {@inheritdoc}
	 * @return \ommu\users\models\UserLevel|array|null
	 */
	public function one($db = null)
	{
		return parent::one($db);
	}
}
