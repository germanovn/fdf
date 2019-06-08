<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tournament}}`.
 */
class m190608_211319_create_tournament_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tournament}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'slug' => $this->string()->notNull()->unique(),
            'nomination_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tournament}}');
    }
}
