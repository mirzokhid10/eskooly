<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%institute_profile}}`.
 */
class m251104_115339_create_institute_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%institute_profile}}', [
            'id' => $this->primaryKey(),

            // Core institute info
            'institute_name' => $this->string(150)->notNull()->unique()->comment('Name of the institute'),
            'institute_logo' => $this->string(255)->null()->comment('Logo file path or URL'),
            'institute_website' => $this->string(255)->null()->comment('Website URL'),

            'institute_phone' => $this->string(20)->null()->comment('Contact phone number'),
            'institute_address' => $this->string(255)->null()->comment('Full address'),
            'institute_country' => $this->string(100)->null()->comment('Country name or ISO code'),

            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%institute_profile}}');
    }
}
