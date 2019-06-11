<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%warnings}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%participant}}`
 * - `{{%participant}}`
 */
class m190608_122006_create_warnings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%warnings}}', [
            'id' => $this->primaryKey(),
            'participant_id' => $this->integer()->notNull(),
            'encounter_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `participant_id`
        $this->createIndex(
            '{{%idx-warnings-participant_id}}',
            '{{%warnings}}',
            'participant_id'
        );

        // add foreign key for table `{{%participant}}`
        $this->addForeignKey(
            '{{%fk-warnings-participant_id}}',
            '{{%warnings}}',
            'participant_id',
            '{{%participant}}',
            'id',
            'CASCADE'
        );

        // creates index for column `encounter_id`
        $this->createIndex(
            '{{%idx-warnings-encounter_id}}',
            '{{%warnings}}',
            'encounter_id'
        );

        // add foreign key for table `{{%encounter}}`
        $this->addForeignKey(
            '{{%fk-warnings-encounter_id}}',
            '{{%warnings}}',
            'encounter_id',
            '{{%encounter}}',
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
            '{{%fk-warnings-participant_id}}',
            '{{%warnings}}'
        );

        // drops index for column `participant_id`
        $this->dropIndex(
            '{{%idx-warnings-participant_id}}',
            '{{%warnings}}'
        );

        // drops foreign key for table `{{%participant}}`
        $this->dropForeignKey(
            '{{%fk-warnings-encounter_id}}',
            '{{%warnings}}'
        );

        // drops index for column `encounter_id`
        $this->dropIndex(
            '{{%idx-warnings-encounter_id}}',
            '{{%warnings}}'
        );

        $this->dropTable('{{%warnings}}');
    }
}
