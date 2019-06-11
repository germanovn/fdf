<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tournament}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%nomination}}`
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

        // creates index for column `nomination_id`
        $this->createIndex(
            '{{%idx-tournament-nomination_id}}',
            '{{%tournament}}',
            'nomination_id'
        );

        // add foreign key for table `{{%nomination}}`
        $this->addForeignKey(
            '{{%fk-tournament-nomination_id}}',
            '{{%tournament}}',
            'nomination_id',
            '{{%nomination}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%nomination}}`
        $this->dropForeignKey(
            '{{%fk-tournament-nomination_id}}',
            '{{%tournament}}'
        );

        // drops index for column `nomination_id`
        $this->dropIndex(
            '{{%idx-tournament-nomination_id}}',
            '{{%tournament}}'
        );

        $this->dropTable('{{%tournament}}');
    }
}
