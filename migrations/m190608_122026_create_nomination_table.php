<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nomination}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%qualifying_scheme}}`
 * - `{{%gender}}`
 */
class m190608_122026_create_nomination_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nomination}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'slug' => $this->string()->notNull()->unique(),
            'qualifying_scheme_id' => $this->integer()->notNull(),
            'encounter_amount' => $this->integer(),
            'participant_amount' => $this->integer(),
            'qualifying_rounds_amount' => $this->integer()->defaultValue(1),
            'final_rounds_amount' => $this->integer(),
            'gender_restriction' => $this->integer()->notNull(),
            'age_of' => $this->integer()->notNull(),
            'age_up_to' => $this->integer()->notNull(),
        ]);

        // creates index for column `qualifying_scheme_id`
        $this->createIndex(
            '{{%idx-nomination-qualifying_scheme_id}}',
            '{{%nomination}}',
            'qualifying_scheme_id'
        );

        // add foreign key for table `{{%qualifying_scheme}}`
        $this->addForeignKey(
            '{{%fk-nomination-qualifying_scheme_id}}',
            '{{%nomination}}',
            'qualifying_scheme_id',
            '{{%qualifying_scheme}}',
            'id',
            'CASCADE'
        );

        // creates index for column `gender_restriction`
        $this->createIndex(
            '{{%idx-nomination-gender_restriction}}',
            '{{%nomination}}',
            'gender_restriction'
        );

        // add foreign key for table `{{%gender}}`
        $this->addForeignKey(
            '{{%fk-nomination-gender_restriction}}',
            '{{%nomination}}',
            'gender_restriction',
            '{{%gender}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%qualifying_scheme}}`
        $this->dropForeignKey(
            '{{%fk-nomination-qualifying_scheme_id}}',
            '{{%nomination}}'
        );

        // drops index for column `qualifying_scheme_id`
        $this->dropIndex(
            '{{%idx-nomination-qualifying_scheme_id}}',
            '{{%nomination}}'
        );

        // drops foreign key for table `{{%gender}}`
        $this->dropForeignKey(
            '{{%fk-nomination-gender_restriction}}',
            '{{%nomination}}'
        );

        // drops index for column `gender_restriction`
        $this->dropIndex(
            '{{%idx-nomination-gender_restriction}}',
            '{{%nomination}}'
        );

        $this->dropTable('{{%nomination}}');
    }
}
