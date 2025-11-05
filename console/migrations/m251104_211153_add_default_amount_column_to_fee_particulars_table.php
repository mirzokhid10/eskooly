<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%fee_particulars}}`.
 */
class m251104_211153_add_default_amount_column_to_fee_particulars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%fee_particulars}}', 'default_amount', $this->string()->notNull()->after('label'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Remove the column if the migration is reverted
        $this->dropColumn('{{%fee_particulars}}', 'default_amount');
    }
}
