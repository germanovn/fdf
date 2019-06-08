<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "warnings".
 *
 * @property int $id
 * @property int $participant_id
 * @property int $encounter_id
 *
 * @property Participant $encounter
 * @property Participant $participant
 */
class Warnings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'warnings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['participant_id', 'encounter_id'], 'required'],
            [['participant_id', 'encounter_id'], 'integer'],
            [['encounter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Participant::className(), 'targetAttribute' => ['encounter_id' => 'id']],
            [['participant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Participant::className(), 'targetAttribute' => ['participant_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'participant_id' => Yii::t('app', 'Participant ID'),
            'encounter_id' => Yii::t('app', 'Encounter ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncounter()
    {
        return $this->hasOne(Participant::className(), ['id' => 'encounter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipant()
    {
        return $this->hasOne(Participant::className(), ['id' => 'participant_id']);
    }
}
