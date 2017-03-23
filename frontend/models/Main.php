<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "main".
 *
 * @property integer $id
 * @property string $date
 * @property integer $department_id
 * @property integer $user_id
 */
class Main extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['department_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'department_id' => 'Department ID',
            'user_id' => 'User ID',
        ];
    }
    public function getDetailes(){
        return $this->hasMany(Detail::className(), ['main_id'=>'id']);
    }
    public function getMaindep(){
        return $this->hasOne(Departments::className(), ['id'=>'department_id']);
    }
}
