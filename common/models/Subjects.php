<?php

namespace common\models;

use yii\db\ActiveRecord;

class Subjects extends ActiveRecord
{
    public static function tableName() {
        return '{{%subjects}}';
    }

    public function rules()
    {
        return [
            [['class_id', 'name', 'total_marks'], 'required'],
            [['class_id'], 'integer'],
            [['total_marks'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }
    public function getClass()
    {
        return $this->hasOne(Classes::class, ['id' => 'class_id']);
    }
}