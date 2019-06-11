<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%encounter}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%participant}}`
 * - `{{%participant}}`
 */
class m190611_082017_create_encounter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%encounter}}', [
            'id' => $this->primaryKey(),
            'blue_participant_id' => $this->integer()->notNull(),
            'red_participant_id' => $this->integer()->notNull(),
            'blue_participant_point' => $this->integer(),
            'red_participant_point' => $this->integer(),
            'blue_participant_warnings' => $this->integer(),
            'red_participant_warnings' => $this->integer(),
        ]);

        // creates index for column `blue_participant_id`
        $this->createIndex(
            '{{%idx-encounter-blue_participant_id}}',
            '{{%encounter}}',
            'blue_participant_id'
        );

        // add foreign key for table `{{%participant}}`
        $this->addForeignKey(
            '{{%fk-encounter-blue_participant_id}}',
            '{{%encounter}}',
            'blue_participant_id',
            '{{%participant}}',
            'id',
            'CASCADE'
        );

        // creates index for column `red_participant_id`
        $this->createIndex(
            '{{%idx-encounter-red_participant_id}}',
            '{{%encounter}}',
            'red_participant_id'
        );

        // add foreign key for table `{{%participant}}`
        $this->addForeignKey(
            '{{%fk-encounter-red_participant_id}}',
            '{{%encounter}}',
            'red_participant_id',
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
        // drops foreign key for table `{{%participant}}`
        $this->dropForeignKey(
            '{{%fk-encounter-blue_participant_id}}',
            '{{%encounter}}'
        );

        // drops index for column `blue_participant_id`
        $this->dropIndex(
            '{{%idx-encounter-blue_participant_id}}',
            '{{%encounter}}'
        );

        // drops foreign key for table `{{%participant}}`
        $this->dropForeignKey(
            '{{%fk-encounter-red_participant_id}}',
            '{{%encounter}}'
        );

        // drops index for column `red_participant_id`
        $this->dropIndex(
            '{{%idx-encounter-red_participant_id}}',
            '{{%encounter}}'
        );

        $this->dropTable('{{%encounter}}');
    }
}
