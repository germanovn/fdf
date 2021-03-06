<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%echelon}}`.
 */
class m190608_121934_create_echelon_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%echelon}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'slug' => $this->string()->notNull()->unique(),
        ]);

        $this->batchInsert('echelon', [
            'name',
            'slug',
        ], [
            ['Базовый',          'bazovyj'],
            ['Первая лига',      'pervaa-liga'],
            ['Турнир чемпионов', 'turnir-cempionov'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%echelon}}');
    }
}
