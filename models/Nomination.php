<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nomination".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $qualifying_scheme_id
 * @property int $encounter_amount
 * @property int $participant_amount
 * @property int $qualifying_rounds_amount
 * @property int $final_rounds_amount
 * @property int $gender_restriction
 * @property int $age_of
 * @property int $age_up_to
 *
 * @property Gender $genderRestriction
 * @property QualifyingScheme $qualifyingScheme
 */
class Nomination extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nomination';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'qualifying_scheme_id', 'gender_restriction', 'age_of', 'age_up_to'], 'required'],
            [['qualifying_scheme_id', 'encounter_amount', 'participant_amount', 'qualifying_rounds_amount', 'final_rounds_amount', 'gender_restriction', 'age_of', 'age_up_to'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['slug'], 'unique'],
            [['gender_restriction'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_restriction' => 'id']],
            [['qualifying_scheme_id'], 'exist', 'skipOnError' => true, 'targetClass' => QualifyingScheme::className(), 'targetAttribute' => ['qualifying_scheme_id' => 'id']],
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
            'qualifying_scheme_id' => Yii::t('app', 'Qualifying Scheme ID'),
            'encounter_amount' => Yii::t('app', 'Encounter Amount'),
            'participant_amount' => Yii::t('app', 'Participant Amount'),
            'qualifying_rounds_amount' => Yii::t('app', 'Qualifying Rounds Amount'),
            'final_rounds_amount' => Yii::t('app', 'Final Rounds Amount'),
            'gender_restriction' => Yii::t('app', 'Gender Restriction'),
            'age_of' => Yii::t('app', 'Age Of'),
            'age_up_to' => Yii::t('app', 'Age Up To'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenderRestriction()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_restriction']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQualifyingScheme()
    {
        return $this->hasOne(QualifyingScheme::className(), ['id' => 'qualifying_scheme_id']);
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
