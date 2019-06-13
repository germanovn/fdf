<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "participant".
 *
 * @property int $id
 * @property string $surname
 * @property string $first_name
 * @property string $middle_name
 * @property int $gender_id
 * @property int $club_id
 * @property string $date_of_birth
 * @property int $echelon_id
 *
 * @property Encounter[] $encounters
 * @property Encounter[] $encounters0
 * @property Club $club
 * @property Echelon $echelon
 * @property Gender $gender
 * @property ParticipantNomination[] $participantNominations
 * @property Nomination[] $nominations
 * @property TournamentParticipant[] $tournamentParticipants
 * @property Tournament[] $tournaments
 */
class Participant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'participant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender_id', 'club_id', 'echelon_id'], 'required'],
            [['gender_id', 'club_id', 'echelon_id'], 'integer'],
            [['date_of_birth'], 'date', 'format' => 'php:Y-m-d'],
            [['surname', 'first_name', 'middle_name'], 'string', 'max' => 255],
            [['club_id'], 'exist', 'skipOnError' => true, 'targetClass' => Club::className(), 'targetAttribute' => ['club_id' => 'id']],
            [['echelon_id'], 'exist', 'skipOnError' => true, 'targetClass' => Echelon::className(), 'targetAttribute' => ['echelon_id' => 'id']],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'surname' => Yii::t('app', 'Surname'),
            'first_name' => Yii::t('app', 'First Name'),
            'middle_name' => Yii::t('app', 'Middle Name'),
            'gender_id' => Yii::t('app', 'Gender ID'),
            'club_id' => Yii::t('app', 'Club ID'),
            'date_of_birth' => Yii::t('app', 'Date Of Birth'),
            'echelon_id' => Yii::t('app', 'Echelon ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncounters()
    {
        return $this->hasMany(Encounter::className(), ['blue_participant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncounters0()
    {
        return $this->hasMany(Encounter::className(), ['red_participant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClub()
    {
        return $this->hasOne(Club::className(), ['id' => 'club_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEchelon()
    {
        return $this->hasOne(Echelon::className(), ['id' => 'echelon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipantNominations()
    {
        return $this->hasMany(ParticipantNomination::className(), ['participant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNominations()
    {
        return $this->hasMany(Nomination::className(), ['id' => 'nomination_id'])->viaTable('participant_nomination', ['participant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTournamentParticipants()
    {
        return $this->hasMany(TournamentParticipant::className(), ['participant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTournaments()
    {
        return $this->hasMany(Tournament::className(), ['id' => 'tournament_id'])->viaTable('tournament_participant', ['participant_id' => 'id']);
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return sprintf( '%s %s %s', $this->first_name, $this->middle_name, $this->surname );
    }
}
