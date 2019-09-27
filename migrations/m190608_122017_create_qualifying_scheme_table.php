<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%qualifying_scheme}}`.
 */
class m190608_122017_create_qualifying_scheme_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%qualifying_scheme}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'slug' => $this->string()->notNull()->unique(),
        ]);

        $this->batchInsert('qualifying_scheme', [
            'name',
            'slug',
        ], [
            ['Швейцарская система', 'swiss-scheme'],
            ['Олимпийская система', 'olymp_scheme'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%qualifying_scheme}}');
    }
}
