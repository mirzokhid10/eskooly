<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chart_of_account}}`.
 */
class m251112_114607_create_chart_of_account_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%chart_of_account}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'type' => "ENUM('income','expense') NOT NULL",
            'created_at' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // Insert some default sample heads
        $this->batchInsert('{{%chart_of_account}}', ['name', 'type', 'created_at', 'updated_at'], [
            ['PHP Bootcamp', 'income', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['English for Beginners', 'income', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['Coffee & Snacks', 'expense', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['Teacher Payment', 'expense', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['Tax Payment', 'expense', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%chart_of_account}}');
    }
}
