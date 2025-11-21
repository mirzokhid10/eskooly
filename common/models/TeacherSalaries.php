<?php

namespace common\models;

use yii\db\ActiveRecord;

class TeacherSalaries extends ActiveRecord
{
    public static function tableName() {
        return '{{%teacher_salaries}}';
    }
}