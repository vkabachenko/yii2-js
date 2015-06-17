<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "countries".
 *
 * @property integer $id
 * @property string $name
 * @property string $capital
 * @property integer $area
 * @property integer $population
 *
 * @property States[] $states
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['area', 'population'], 'integer'],
            [['name', 'capital'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'capital' => 'Capital',
            'area' => 'Area',
            'population' => 'Population',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStates()
    {
        return $this->hasMany(States::className(), ['id_country' => 'id']);
    }

    /**
     * array of countries as id => name
     * @return array
     */

    public static function getList() {

        $countries = static::find()->orderBy('name')->all();
        return ArrayHelper::map($countries,'id','name');
    }

}
