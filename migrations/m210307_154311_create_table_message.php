<?php

use yii\db\Migration;

/**
 * Class m210307_154311_create_table_message
 */
class m210307_154311_create_table_message extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('message', [
            'id' => 'int(10) UNSIGNED NOT NULL AUTO_INCREMENT',
            'from_user_id' => 'int(10) UNSIGNED NOT NULL',
            'to_user_id' => 'int(10) UNSIGNED NOT NULL',
            'trip_id' => 'int(10) UNSIGNED NOT NULL',
            'text' => 'text CHARACTER SET utf8 NOT NULL',
            'created' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP()',
            'PRIMARY KEY (id)',
            'INDEX `idx_message_from_user_id_user` (from_user_id)',
            'INDEX `idx_message_to_user_id_user` (to_user_id)',
            'INDEX `idx_message_trip_id_trip` (trip_id)',
            'CONSTRAINT `fk_message_from_user_id_user`
                FOREIGN KEY (from_user_id)
                REFERENCES user (id)
                ON UPDATE CASCADE',
            'CONSTRAINT `fk_message_to_user_id_user`
                FOREIGN KEY (to_user_id)
                REFERENCES user (id)
                ON UPDATE CASCADE',
            'CONSTRAINT `fk_message_trip_id_trip`
                FOREIGN KEY (trip_id)
                REFERENCES trip (id)
                ON UPDATE CASCADE'
        ],
        'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('message');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210307_154311_create_table_message cannot be reverted.\n";

        return false;
    }
    */
}
