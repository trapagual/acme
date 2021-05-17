<?php

use yii\db\Migration;

/**
 * Class m210516_170944_creaate_place_lang_table
 */
class m210516_170944_creaate_place_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%place_lang}}', [
            'id' => $this->primaryKey()->unsigned(),
            'place_id' => $this->integer()->unsigned()->notNull(),
            'locality' => $this->string(45)->notNull(),
            'lang' => $this->string(2)->notNull()
        ]);

        $this->createIndex('idx_place_lang_place_id', 'place_lang', 'place_id');
        $this->addForeignKey('fk_place_lang_place', 'place_lang', 'place_id', 'place', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_place_lang_place', 'place_lang');
        $this->dropIndex('idx_place_lang_place_id', 'place_lang');
        $this->dropTable('{{%place_lang}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210516_170944_creaate_place_lang_table cannot be reverted.\n";

        return false;
    }
    */
}
