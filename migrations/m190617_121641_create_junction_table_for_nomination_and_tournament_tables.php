<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nomination_tournament}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%nomination}}`
 * - `{{%tournament}}`
 */
class m190617_121641_create_junction_table_for_nomination_and_tournament_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nomination_tournament}}', [
            'nomination_id' => $this->integer(),
            'tournament_id' => $this->integer(),
            'PRIMARY KEY(nomination_id, tournament_id)',
        ]);

        // creates index for column `nomination_id`
        $this->createIndex(
            '{{%idx-nomination_tournament-nomination_id}}',
            '{{%nomination_tournament}}',
            'nomination_id'
        );

        // add foreign key for table `{{%nomination}}`
        $this->addForeignKey(
            '{{%fk-nomination_tournament-nomination_id}}',
            '{{%nomination_tournament}}',
            'nomination_id',
            '{{%nomination}}',
            'id',
            'CASCADE'
        );

        // creates index for column `tournament_id`
        $this->createIndex(
            '{{%idx-nomination_tournament-tournament_id}}',
            '{{%nomination_tournament}}',
            'tournament_id'
        );

        // add foreign key for table `{{%tournament}}`
        $this->addForeignKey(
            '{{%fk-nomination_tournament-tournament_id}}',
            '{{%nomination_tournament}}',
            'tournament_id',
            '{{%tournament}}',
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
            '{{%fk-nomination_tournament-nomination_id}}',
            '{{%nomination_tournament}}'
        );

        // drops index for column `nomination_id`
        $this->dropIndex(
            '{{%idx-nomination_tournament-nomination_id}}',
            '{{%nomination_tournament}}'
        );

        // drops foreign key for table `{{%tournament}}`
        $this->dropForeignKey(
            '{{%fk-nomination_tournament-tournament_id}}',
            '{{%nomination_tournament}}'
        );

        // drops index for column `tournament_id`
        $this->dropIndex(
            '{{%idx-nomination_tournament-tournament_id}}',
            '{{%nomination_tournament}}'
        );

        $this->dropTable('{{%nomination_tournament}}');
    }
}
