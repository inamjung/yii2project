<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "detail".
 *
 * @property integer $id
 * @property integer $main_id
 * @property string $name
 * @property integer $qty
 */
class Detail extends \yii\db\ActiveRecord
{
    const UPDATE_TYPE_CREATE = 'create';
    const UPDATE_TYPE_UPDATE = 'update';
    const UPDATE_TYPE_DELETE = 'delete';

    const SCENARIO_BATCH_UPDATE = 'batchUpdate';
 

    private $_updateType;

    public function getUpdateType()
    {
        if (empty($this->_updateType)) {
          if ($this->isNewRecord) {
                $this->_updateType = self::UPDATE_TYPE_CREATE;
            } else 
                $this->_updateType = self::UPDATE_TYPE_UPDATE;
            }
       
        return $this->_updateType;
    }
    

    public function setUpdateType($value)
    {
        $this->_updateType = $value;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['updateType', 'required', 'on' => self::SCENARIO_BATCH_UPDATE],
            ['updateType',
                'in',
                'range' => [self::UPDATE_TYPE_CREATE, self::UPDATE_TYPE_UPDATE,  self::UPDATE_TYPE_DELETE],
                'on' => self::SCENARIO_BATCH_UPDATE]
            ,
            [['main_id', 'qty'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'main_id' => 'Main ID',
            'name' => 'Name',
            'qty' => 'Qty',
        ];
    }
}
