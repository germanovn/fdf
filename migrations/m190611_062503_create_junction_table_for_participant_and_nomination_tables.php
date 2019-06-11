<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%participant_nomination}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%participant}}`
 * - `{{%nomination}}`
 */
class m190611_062503_create_junction_table_for_participant_and_nomination_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%participant_nomination}}', [
            'participant_id' => $this->integer(),
            'nomination_id' => $this->integer(),
            'PRIMARY KEY(participant_id, nomination_id)',
        ]);

        // creates index for column `participant_id`
        $this->createIndex(
            '{{%idx-participant_nomination-participant_id}}',
            '{{%participant_nomination}}',
            'participant_id'
        );

        // add foreign key for table `{{%participant}}`
        $this->addForeignKey(
            '{{%fk-participant_nomination-participant_id}}',
            '{{%participant_nomination}}',
            'participant_id',
            '{{%participant}}',
            'id',
            'CASCADE'
        );

        // creates index for column `nomination_id`
        $this->createIndex(
            '{{%idx-participant_nomination-nomination_id}}',
            '{{%participant_nomination}}',
            'nomination_id'
        );

        // add foreign key for table `{{%nomination}}`
        $this->addForeignKey(
            '{{%fk-participant_nomination-nomination_id}}',
            '{{%participant_nomination}}',
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
        // drops foreign key for table `{{%participant}}`
        $this->dropForeignKey(
            '{{%fk-participant_nomination-participant_id}}',
            '{{%participant_nomination}}'
        );

        // drops index for column `participant_id`
        $this->dropIndex(
            '{{%idx-participant_nomination-participant_id}}',
            '{{%participant_nomination}}'
        );

        // drops foreign key for table `{{%nomination}}`
        $this->dropForeignKey(
            '{{%fk-participant_nomination-nomination_id}}',
            '{{%participant_nomination}}'
        );

        // drops index for column `nomination_id`
        $this->dropIndex(
            '{{%idx-participant_nomination-nomination_id}}',
            '{{%participant_nomination}}'
        );

        $this->dropTable('{{%participant_nomination}}');
    }
}
