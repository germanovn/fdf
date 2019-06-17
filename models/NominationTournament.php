<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nomination_tournament".
 *
 * @property int $nomination_id
 * @property int $tournament_id
 *
 * @property Nomination $nomination
 * @property Tournament $tournament
 */
class NominationTournament extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nomination_tournament';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomination_id', 'tournament_id'], 'required'],
            [['nomination_id', 'tournament_id'], 'integer'],
            [['nomination_id', 'tournament_id'], 'unique', 'targetAttribute' => ['nomination_id', 'tournament_id']],
            [['nomination_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nomination::className(), 'targetAttribute' => ['nomination_id' => 'id']],
            [['tournament_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tournament::className(), 'targetAttribute' => ['tournament_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nomination_id' => Yii::t('app', 'Nomination ID'),
            'tournament_id' => Yii::t('app', 'Tournament ID'),
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
    public function getTournament()
    {
        return $this->hasOne(Tournament::className(), ['id' => 'tournament_id']);
    }
}
