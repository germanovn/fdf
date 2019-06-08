<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qualifying_scheme".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 *
 * @property Nomination[] $nominations
 */
class QualifyingScheme extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qualifying_scheme';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['slug'], 'unique'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNominations()
    {
        return $this->hasMany(Nomination::className(), ['qualifying_scheme_id' => 'id']);
    }
}
