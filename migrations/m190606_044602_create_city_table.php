<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%city}}`.
 */
class m190606_044602_create_city_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'slug' => $this->string()->notNull()->unique(),
        ]);

        $this->batchInsert('city', [
            'name',
            'slug',
        ], [
            ['Екатеринбург', 'ekaterinburg'],
            ['Челябинск',    'celabinsk'],
            ['Перьмь',       'perm'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%city}}');
    }
}
