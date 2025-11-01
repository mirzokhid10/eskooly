<?php

namespace common\models;

class Employees extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%employees}}';
    }
}