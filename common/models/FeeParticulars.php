<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class FeeParticulars extends ActiveRecord
{
    public static function tableName() {
        return 'fee_particulars';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function rules() {
        return [
            [['code', 'label'], 'required'],
            [['default_amount'], 'required'],
            [['default_amount'], 'number'],

            [['is_discount', 'is_fixed', 'is_locked', 'active'], 'boolean'],
            [['sort_order'], 'integer'],
            [['code'], 'string', 'max' => 50],
            [['label'], 'string', 'max' => 100],
            [['code'], 'unique'],
        ];

    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'System Code',
            'label' => 'Fee Label',
            'is_discount' => 'Is Discount',
            'is_fixed' => 'Is Fixed',
            'is_locked' => 'Is Locked',
            'sort_order' => 'Sort Order',
            'active' => 'Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];

    }

}