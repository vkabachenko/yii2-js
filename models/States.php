<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "states".
 *
 * @property integer $id
 * @property integer $id_country
 * @property string $name
 *
 * @property Countries $idCountry
 */
class States extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'states';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_country'], 'integer'],
            [['id'], 'safe'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_country' => 'Country',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCountry()
    {
        return $this->hasOne(Countries::className(), ['id' => 'id_country']);
    }

    /**
     * first state of given country
     *
     * @param $id_country integer
     * @return States
     */

    public static function firstRecord($id_country)
    {

        return static::find()
            ->where(['id_country' => $id_country])
            ->orderBy('name')->one();

    }

}
