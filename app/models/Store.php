<?php

class Store extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $id;

    /**
     *
     * @var string
     */
    public $owner;

    /**
     *
     * @var string
     */
    public $desc;

    /**
     *
     * @var string
     */
    public $logo;

    /**
     *
     * @var string
     */
    public $banner;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $bgpattern;

    /**
     *
     * @var string
     */
    public $cdate;

    /**
     *
     * @var string
     */
    public $mdate;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Items', 'store', array('alias' => 'Items'));
        $this->hasMany('id', 'Sreview', 'store', array('alias' => 'Sreview'));
        $this->belongsTo('owner', 'Users', 'id', array('alias' => 'Users'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'store';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Store[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Store
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
