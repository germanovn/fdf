<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tournament}}`.
 * Has foreign keys to the tables:
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
