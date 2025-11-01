<?php

namespace common\models;

use yii\db\ActiveRecord;
use Yii;


class StudentClasses extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%student_classes}}';
    }

    public function rules() {
        return [
            [['student_id', 'class_id'], 'required'],
            [['student_id', 'class_id', 'enrolled_at'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student',
            'class_id' => 'Class',
            'enrolled_at' => 'Enrolled At',
        ];
    }

    public function getStudent()
    {
        return $this->hasOne(Students::class, ['id' => 'student_id']);
    }

    public function getClass()
    {
        return $this->hasOne(Classes::class, ['id' => 'class_id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $time = date('Y-m-d H:i:s');
            if ($this->isNewRecord) {
                $this->created_at = $time;
                $this->enrolled_at = time(); // keep your existing logic
            }
            $this->updated_at = $time;
            return true;
        }
        return false;
    }
}