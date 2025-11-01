<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%classes}}`.
 */
class m251027_113641_create_classes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%classes}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'monthly_fee' => $this->decimal(10,2)->notNull()->defaultValue(0),
            'teacher_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Add FK (teacher_id → employees.id)
        $this->addForeignKey(
            'fk-classes-teacher_id',
            '{{%classes}}',
            'teacher_id',
            '{{%employees}}',
            'id',
            'SET NULL',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-classes-teacher_id', '{{%classes}}');
        $this->dropTable('{{%classes}}');
    }
}
