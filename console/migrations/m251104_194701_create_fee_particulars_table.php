<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%fee_particulars}}`.
 */
class m251104_194701_create_fee_particulars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%fee_particulars}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(50)->notNull()->unique(),
            'label' => $this->string(100)->notNull(),
            'target_type'=> $this->string(20)->notNull()->defaultValue('all'),
            'is_discount' => $this->boolean()->defaultValue(false),
            'is_fixed' => $this->boolean()->defaultValue(false),
            'is_locked' => $this->boolean()->defaultValue(false),
            'sort_order' => $this->integer()->defaultValue(0),
            'active' => $this->boolean()->defaultValue(true),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%fee_particulars}}');
    }
}
