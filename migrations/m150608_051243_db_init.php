<?php

use yii\db\Schema;
use yii\db\Migration;

class m150608_051243_db_init extends Migration
{
    private $index = 0;

    public function up()
    {
        $this->createTable('countries',[
           'id' => 'pk',
           'name' => 'string',
           'capital' => 'string',
           'area' => 'integer',
           'population' => 'integer',
        ]);

        $this->createTable('states',[
            'id' => 'pk',
            'id_country' => 'integer',
            'name' => 'string',
        ]);

	$this->createIndex('countryName','countries','name',true); // unique name of country	

        $this->createIndex('idCountry','states','id_country');

        $this->execute("ALTER TABLE states ADD FOREIGN KEY ( id_country )
         REFERENCES countries (id) ON DELETE CASCADE ON UPDATE CASCADE ;");

        /* insert test data
        data from https://www.cia.gov/library/publications/resources/the-world-factbook/
        */

        $this->insertData([
            'name' => 'United States',
            'capital' => 'Washington, DC',
            'area' => 9826675,
            'population' => 318892103,
        ],
            'Alabama, Alaska, Arizona, Arkansas, California, Colorado, Connecticut, Delaware, District of Columbia*, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Iowa, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi, Missouri, Montana, Nebraska, Nevada, New Hampshire, New Jersey, New Mexico, New York, North Carolina, North Dakota, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, South Dakota, Tennessee, Texas, Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming'
        );

        $this->insertData([
                'name' => 'Canada',
                'capital' => 'Ottawa',
                'area' => 9984670,
                'population' => 34834841,
            ],
            'Alberta, British Columbia, Manitoba, New Brunswick, Newfoundland and Labrador, Northwest Territories*, Nova Scotia, Nunavut*, Ontario, Prince Edward Island, Quebec, Saskatchewan, Yukon*'
        );

        $this->insertData([
                'name' => 'Australia',
                'capital' => 'Canberra',
                'area' => 7741220,
                'population' => 22507617,
            ],
            'Australian Capital Territory*, New South Wales, Northern Territory*, Queensland, South Australia, Tasmania, Victoria, Western Australia'
        );

    }

    public function down()
    {

        $this->dropTable('states');
        $this->dropTable('countries');

    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */

    /**
     * @param $country Array country fields
     * @param $states String list of states
     */

    private function insertData($country, $states)
    {

        $this->insert('countries',$country);
        $this->fillStates(++$this->index,$states);

    }

    /**
     * Fills table states with data from the list of states as a string
     * @param $id_country
     * @param $states string
     *
     */
    private function fillStates($id_country,$states)
    {
        $arrStates = explode(', ',$states);

        foreach($arrStates as $state) {
            $this->insert('states',[
                'id_country' => $id_country,
                'name' => $state
            ]);
        }
    }
}
