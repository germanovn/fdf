<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tournament_participant}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%tournament}}`
 * - `{{%participant}}`
 */
class m190608_211329_create_junction_table_for_tournament_and_participant_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tournament_participant}}', [
            'tournament_id' => $this->integer(),
            'participant_id' => $this->integer(),
            'PRIMARY KEY(tournament_id, participant_id)',
        ]);

        // creates index for column `tournament_id`
        $this->createIndex(
            '{{%idx-tournament_participant-tournament_id}}',
            '{{%tournament_participant}}',
            'tournament_id'
        );

        // add foreign key for table `{{%tournament}}`
        $this->addForeignKey(
            '{{%fk-tournament_participant-tournament_id}}',
            '{{%tournament_participant}}',
            'tournament_id',
            '{{%tournament}}',
            'id',
            'CASCADE'
        );

        // creates index for column `participant_id`
        $this->createIndex(
            '{{%idx-tournament_participant-participant_id}}',
            '{{%tournament_participant}}',
            'participant_id'
        );

        // add foreign key for table `{{%participant}}`
        $this->addForeignKey(
            '{{%fk-tournament_participant-participant_id}}',
            '{{%tournament_participant}}',
            'participant_id',
            '{{%participant}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%tournament}}`
        $this->dropForeignKey(
            '{{%fk-tournament_participant-tournament_id}}',
            '{{%tournament_participant}}'
        );

        // drops index for column `tournament_id`
        $this->dropIndex(
            '{{%idx-tournament_participant-tournament_id}}',
            '{{%tournament_participant}}'
        );

        // drops foreign key for table `{{%participant}}`
        $this->dropForeignKey(
            '{{%fk-tournament_participant-participant_id}}',
            '{{%tournament_participant}}'
        );

        // drops index for column `participant_id`
        $this->dropIndex(
            '{{%idx-tournament_participant-participant_id}}',
            '{{%tournament_participant}}'
        );

        $this->dropTable('{{%tournament_participant}}');
    }
}
