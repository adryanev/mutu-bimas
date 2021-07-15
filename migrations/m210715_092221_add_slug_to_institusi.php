<?php

use yii\db\Migration;

/**
 * Class m210715_092221_add_slug_to_institusi
 */
class m210715_092221_add_slug_to_institusi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%institusi}}','slug',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%institusi}}','slug');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210715_092221_add_slug_to_institusi cannot be reverted.\n";

        return false;
    }
    */
}
