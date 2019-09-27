<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%club}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%city}}`
 */
class m190606_045012_create_club_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%club}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'slug' => $this->string()->notNull()->unique(),
            'city_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `city_id`
        $this->createIndex(
            '{{%idx-club-city_id}}',
            '{{%club}}',
            'city_id'
        );

        // add foreign key for table `{{%city}}`
        $this->addForeignKey(
            '{{%fk-club-city_id}}',
            '{{%club}}',
            'city_id',
            '{{%city}}',
            'id',
            'CASCADE'
        );

        $this->batchInsert('club', [
            'name',
            'slug',
            'city_id',
        ], [
            ['No Name',    'no-name',    '1'],
            ['Club Test',  'club-test',  '2'],
            ['D&D lovers', 'd-d-lovers', '3'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%city}}`
        $this->dropForeignKey(
            '{{%fk-club-city_id}}',
            '{{%club}}'
        );

        // drops index for column `city_id`
        $this->dropIndex(
            '{{%idx-club-city_id}}',
            '{{%club}}'
        );

        $this->dropTable('{{%club}}');
    }
}
