<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tournament".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $nomination_id
 *
 * @property Nomination $nomination
 * @property Participant[] $participants
 */
class Tournament extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tournament';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'nomination_id'], 'required'],
            [['nomination_id'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['slug'], 'unique'],
            [['nomination_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nomination::className(), 'targetAttribute' => ['nomination_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
            'nomination_id' => Yii::t('app', 'Nomination ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNomination()
    {
        return $this->hasOne(Nomination::className(), ['id' => 'nomination_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTournamentParticipants()
    {
        return $this->hasMany(TournamentParticipant::className(), ['tournament_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipants()
    {
        return $this->hasMany(Participant::className(), ['id' => 'participant_id'])->viaTable('tournament_participant', ['tournament_id' => 'id']);
    }

    /**
     * Slug
     * @link https://github.com/zelenin/yii2-slug-behavior
     * @return array
     */
    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'Zelenin\yii\behaviors\Slug',
                'slugAttribute' => 'slug',
                'attribute' => 'name',
            ]
        ];
    }
}
