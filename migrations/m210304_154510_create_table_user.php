<?php

use yii\db\Migration;

/**
 * Class m210304_154510_create_table_user
 */
class m210304_154510_create_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => 'int(10) UNSIGNED NOT NULL AUTO_INCREMENT',
            'uid' => 'varchar(60) NOT NULL',
            'username' => 'varchar(45) NOT NULL',
            'email' =>  'varchar(255) NOT NULL',
            'password' => 'varchar(60) NOT NULL',
            'status' => 'tinyint(4) NOT NULL DEFAULT 0',
            'contact_email' => 'bit(1) NOT NULL DEFAULT b\'0\'',
            'contact_phone' => 'bit(1) NOT NULL DEFAULT b\'0\'',
            'created' => 'timestamp NOT NULL DEFAULT current_timestamp()',
            'updated' => 'timestamp NOT NULL DEFAULT \'0000-00-00 00:00:00\'',
            'PRIMARY KEY (`id`)',
            'CONSTRAINT `email_unique` UNIQUE (`email`)'
        ], 
        'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
