<?php

namespace common\models;

use yii\base\Model;
use Yii;

class FreeForm extends Model
{
    public $labels = [];
    public $amounts = [];
    public $target_type;

    public function rules()
    {
        return [
            [['target_type'], 'string'],
            [['labels', 'amounts'], 'safe'], // simpler and more flexible
        ];
    }

    public function save()
    {
        if (!$this->validate()) {
            return false;
        }

        $success = true;

        foreach ($this->labels as $id => $label) {
            $particular = FeeParticulars::findOne($id);

            if ($particular) {
                $particular->label = $label;

                $amount = trim($this->amounts[$id] ?? '');
                if (strtolower($amount) !== 'fixed' && $amount !== '') {
                    $particular->default_amount = (float)$amount;
                }

                if (!$particular->save()) {
                    $success = false;
                    Yii::error("Failed to save Fee Particular ID {$id}: " . json_encode($particular->errors));
                }
            } else {
                Yii::error("Fee Particular ID {$id} not found.");
                $success = false;
            }
        }

        return $success;
    }
}