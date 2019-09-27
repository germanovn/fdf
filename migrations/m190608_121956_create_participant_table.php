<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%participant}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%gender}}`
 * - `{{%club}}`
 * - `{{%echelon}}`
 */
class m190608_121956_create_participant_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%participant}}', [
            'id' => $this->primaryKey(),
            'surname' => $this->string(),
            'first_name' => $this->string(),
            'middle_name' => $this->string(),
            'gender_id' => $this->integer()->notNull(),
            'club_id' => $this->integer()->notNull(),
            'date_of_birth' => $this->dateTime(),
            'echelon_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `gender_id`
        $this->createIndex(
            '{{%idx-participant-gender_id}}',
            '{{%participant}}',
            'gender_id'
        );

        // add foreign key for table `{{%gender}}`
        $this->addForeignKey(
            '{{%fk-participant-gender_id}}',
            '{{%participant}}',
            'gender_id',
            '{{%gender}}',
            'id',
            'CASCADE'
        );

        // creates index for column `club_id`
        $this->createIndex(
            '{{%idx-participant-club_id}}',
            '{{%participant}}',
            'club_id'
        );

        // add foreign key for table `{{%club}}`
        $this->addForeignKey(
            '{{%fk-participant-club_id}}',
            '{{%participant}}',
            'club_id',
            '{{%club}}',
            'id',
            'CASCADE'
        );

        // creates index for column `echelon_id`
        $this->createIndex(
            '{{%idx-participant-echelon_id}}',
            '{{%participant}}',
            'echelon_id'
        );

        // add foreign key for table `{{%echelon}}`
        $this->addForeignKey(
            '{{%fk-participant-echelon_id}}',
            '{{%participant}}',
            'echelon_id',
            '{{%echelon}}',
            'id',
            'CASCADE'
        );

        $this->batchInsert('participant', [
            'surname',
            'first_name',
            'middle_name',
            'gender_id',
            'club_id',
            'date_of_birth',
            'echelon_id',
        ], [
            ['Alaster',	    'Ruby',  'Mi',        '1', '1', '1994-09-18 00:00:00', '1'],
            ['Odin',	    'Dva',   'Tree',      '2', '1', '1991-06-18 00:00:00', '1'],
            ['Ктотко',	    'Ктото', 'Ктотович',  '1', '2', '1989-07-17 00:00:00', '2'],
            ['Female',	    'Fem',   'Игоревна',  '3', '1', '1974-02-18 00:00:00', '2'],
            ['Крузенштерн',	'Иван',  'Фёдорович', '2', '2', '1770-11-19 00:00:00', '3'],
            ['Романов',	    'Роман', 'Романович', '2', '2', '2001-01-21 00:00:00', '2'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%gender}}`
        $this->dropForeignKey(
            '{{%fk-participant-gender_id}}',
            '{{%participant}}'
        );

        // drops index for column `gender_id`
        $this->dropIndex(
            '{{%idx-participant-gender_id}}',
            '{{%participant}}'
        );

        // drops foreign key for table `{{%club}}`
        $this->dropForeignKey(
            '{{%fk-participant-club_id}}',
            '{{%participant}}'
        );

        // drops index for column `club_id`
        $this->dropIndex(
            '{{%idx-participant-club_id}}',
            '{{%participant}}'
        );

        // drops foreign key for table `{{%echelon}}`
        $this->dropForeignKey(
            '{{%fk-participant-echelon_id}}',
            '{{%participant}}'
        );

        // drops index for column `echelon_id`
        $this->dropIndex(
            '{{%idx-participant-echelon_id}}',
            '{{%participant}}'
        );

        $this->dropTable('{{%participant}}');
    }
}
