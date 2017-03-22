<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string $name
 * @property string $public_email
 * @property string $gravatar_email
 * @property string $gravatar_id
 * @property string $location
 * @property string $website
 * @property string $bio
 * @property string $avatar
 * @property integer $department_id
 * @property integer $position_id
 * @property string $birthday
 * @property string $cid
 * @property string $education
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'department_id', 'position_id'], 'integer'],
            [['bio'], 'string'],
            [['birthday'], 'safe'],
            [['name', 'public_email', 'gravatar_email', 'location', 'website', 'avatar', 'education'], 'string', 'max' => 255],
            [['gravatar_id'], 'string', 'max' => 32],
            [['cid'], 'string', 'max' => 13],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'name' => 'Name',
            'public_email' => 'Public Email',
            'gravatar_email' => 'Gravatar Email',
            'gravatar_id' => 'Gravatar ID',
            'location' => 'Location',
            'website' => 'Website',
            'bio' => 'Bio',
            'avatar' => 'Avatar',
            'department_id' => 'Department ID',
            'position_id' => 'Position ID',
            'birthday' => 'Birthday',
            'cid' => 'Cid',
            'education' => 'Education',
        ];
    }
}
