<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%encounter}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%participant}}`
 * - `{{%participant}}`
 * - `{{%warnings}}`
 * - `{{%warnings}}`
 */
class m190611_071206_create_encounter_table extends Migration
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
            'blue_participant_warnings' => $this->integer()->notNull(),
            'red_participant_warnings' => $this->integer()->notNull(),
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

        // creates index for column `blue_participant_warnings`
        $this->createIndex(
            '{{%idx-encounter-blue_participant_warnings}}',
            '{{%encounter}}',
            'blue_participant_warnings'
        );

        // add foreign key for table `{{%warnings}}`
        $this->addForeignKey(
            '{{%fk-encounter-blue_participant_warnings}}',
            '{{%encounter}}',
            'blue_participant_warnings',
            '{{%warnings}}',
            'id',
            'CASCADE'
        );

        // creates index for column `red_participant_warnings`
        $this->createIndex(
            '{{%idx-encounter-red_participant_warnings}}',
            '{{%encounter}}',
            'red_participant_warnings'
        );

        // add foreign key for table `{{%warnings}}`
        $this->addForeignKey(
            '{{%fk-encounter-red_participant_warnings}}',
            '{{%encounter}}',
            'red_participant_warnings',
            '{{%warnings}}',
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

        // drops foreign key for table `{{%warnings}}`
        $this->dropForeignKey(
            '{{%fk-encounter-blue_participant_warnings}}',
            '{{%encounter}}'
        );

        // drops index for column `blue_participant_warnings`
        $this->dropIndex(
            '{{%idx-encounter-blue_participant_warnings}}',
            '{{%encounter}}'
        );

        // drops foreign key for table `{{%warnings}}`
        $this->dropForeignKey(
            '{{%fk-encounter-red_participant_warnings}}',
            '{{%encounter}}'
        );

        // drops index for column `red_participant_warnings`
        $this->dropIndex(
            '{{%idx-encounter-red_participant_warnings}}',
            '{{%encounter}}'
        );

        $this->dropTable('{{%encounter}}');
    }
}
