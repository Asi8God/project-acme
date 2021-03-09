<?php

use yii\db\Migration;

/**
 * Class m210307_075557_create_table_trip
 */
class m210307_075557_create_table_trip extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //$this->execute('');
        
        $this->createTable('trip', [
            'id' => 'int(10) UNSIGNED NOT NULL AUTO_INCREMENT',
            'user_id' => 'int(10) UNSIGNED NOT NULL',
            'from' => 'int(10) UNSIGNED NOT NULL',
            'to' => 'int(10) UNSIGNED NOT NULL',
            'date' => 'datetime NOT NULL',
            'number_seats' => 'tinyint(3) UNSIGNED NOT NULL',
            'duration' => 'decimal(10,1) NOT NULL',
            'price' => 'decimal(10,2) NOT NULL',
            'currency_id' => 'tinyint(3) UNSIGNED NOT NULL',
            'status' => 'tinyint(3) UNSIGNED NOT NULL DEFAULT 1',
            'created' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP()',
            'updated' => 'timestamp NOT NULL DEFAULT \'0000-00-00 00:00:00\'',
            'PRIMARY KEY (id)',
            'INDEX `idx_trip_user_id_user` (user_id)',
            'INDEX `idx_trip_from_place` (`from`)',
            'INDEX `idx_trip_to_place` (`to`)',
            'INDEX `idx_trip_currency_id_currency` (currency_id)',
            'CONSTRAINT `fk_trip_user_id_user` 
                FOREIGN KEY (user_id) 
                REFERENCES user (id) 
                ON UPDATE CASCADE',
            'CONSTRAINT `fk_trip_from_place` 
                FOREIGN KEY (`from`) 
                REFERENCES place (id) 
                ON UPDATE CASCADE',
            'CONSTRAINT `fk_trip_to_place` 
                FOREIGN KEY (`to`) 
                REFERENCES place (id) 
                ON UPDATE CASCADE',
            'CONSTRAINT `fk_trip_currency_id_currency` 
                FOREIGN KEY (currency_id) 
                REFERENCES currency (id) 
                ON UPDATE CASCADE',
        ],
        'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('trip');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210307_075557_create_table_trip cannot be reverted.\n";

        return false;
    }
    */
}
