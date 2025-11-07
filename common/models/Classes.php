<?php

namespace common\models;

/**
 * This is the model class for table "classes".
 *
 * @property int $id
 * @property string $name
 * @property float $monthly_fee
 * @property int|null $teacher_id
 * @property int $created_at
 * @property int $updated_at
 */

class Classes extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%classes}}';
    }

    public function rules()
    {
        return [
            [['name', 'monthly_fee'], 'required'],
            [['teacher_id', 'created_at', 'updated_at'], 'integer'],
            [['monthly_fee'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Class Name',
            'monthly_fee' => 'Monthly Fee',
            'teacher_id' => 'Teacher',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $time = time();
            if ($this->isNewRecord) {
                $this->created_at = $time;
            }
            $this->updated_at = $time;
            return true;
        }
        return false;
    }

    public function getTeacher()
    {
        return $this->hasOne(\common\models\Employees::class, ['id' => 'teacher_id']);
    }

    public function getStudentClasses()
    {
        return $this->hasMany(StudentClasses::class, ['class_id' => 'id']);
    }

    public function getStudents()
    {
        return $this->hasMany(Students::class, ['id' => 'student_id'])
            ->via('studentClasses');
    }

    public function getSubjects()
    {
        return $this->hasMany(Subjects::class, ['class_id' => 'id']);
    }
}