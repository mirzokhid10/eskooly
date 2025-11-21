<?php

namespace common\models;

use yii\db\ActiveRecord;

class StudentPayments extends ActiveRecord
{
    public static function tableName() {
        return '{{%student_payments}}';
    }

    public function getStudent()
    {
        return $this->hasOne(Students::class, ['id' => 'student_id']);
    }

    public function getFeeDetails()
    {
        return $this->hasMany(StudentFeeDetails::class, ['student_payment_id' => 'id']);
    }

}