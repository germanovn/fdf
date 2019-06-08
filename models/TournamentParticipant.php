<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tournament_participant".
 *
 * @property int $tournament_id
 * @property int $participant_id
 *
 * @property Participant $participant
 * @property Tournament $tournament
 */
class TournamentParticipant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tournament_participant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tournament_id', 'participant_id'], 'required'],
            [['tournament_id', 'participant_id'], 'integer'],
            [['tournament_id', 'participant_id'], 'unique', 'targetAttribute' => ['tournament_id', 'participant_id']],
            [['participant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Participant::className(), 'targetAttribute' => ['participant_id' => 'id']],
            [['tournament_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tournament::className(), 'targetAttribute' => ['tournament_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tournament_id' => Yii::t('app', 'Tournament ID'),
            'participant_id' => Yii::t('app', 'Participant ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipant()
    {
        return $this->hasOne(Participant::className(), ['id' => 'participant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTournament()
    {
        return $this->hasOne(Tournament::className(), ['id' => 'tournament_id']);
    }
}
