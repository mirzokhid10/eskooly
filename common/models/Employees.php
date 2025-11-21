<?php

namespace common\models;

class Employees extends \yii\db\ActiveRecord
{
    public $imageFile;
    public static function tableName()
    {
        return '{{%employees}}';
    }
    public function rules()
    {
        return [
            [['name', 'mobile', 'email', 'role'], 'required'],
            [['salary'], 'number'],
            [['photo', 'education', 'religion', 'gender', 'blood_group', 'experience', 'home_address'], 'string'],
            [['date_of_birth', 'date_of_joining'], 'safe'],
            [['imageFile'], 'file', 'extensions' => 'png, jpg, jpeg', 'skipOnEmpty' => true],
        ];
    }
}