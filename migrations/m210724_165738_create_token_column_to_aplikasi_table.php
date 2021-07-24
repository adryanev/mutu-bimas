<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%token_column_to_aplikasi}}`.
 */
class m210724_165738_create_token_column_to_aplikasi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%aplikasi}}','token',$this->string(32));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('{{%aplikasi}}','token');
    }
}
