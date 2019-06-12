<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "participant_nomination".
 *
 * @property int $participant_id
 * @property int $nomination_id
 *
 * @property Nomination $nomination
 * @property Participant $participant
 */
class ParticipantNomination extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'participant_nomination';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['participant_id', 'nomination_id'], 'required'],
            [['participant_id', 'nomination_id'], 'integer'],
            [['participant_id', 'nomination_id'], 'unique', 'targetAttribute' => ['participant_id', 'nomination_id']],
            [['nomination_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nomination::className(), 'targetAttribute' => ['nomination_id' => 'id']],
            [['participant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Participant::className(), 'targetAttribute' => ['participant_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'participant_id' => Yii::t('app', 'Participant ID'),
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
    public function getParticipant()
    {
        return $this->hasOne(Participant::className(), ['id' => 'participant_id']);
    }
}
