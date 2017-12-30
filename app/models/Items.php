<?php

class Items extends \Phalcon\Mvc\Model
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
    public $name;

    /**
     *
     * @var string
     */
    public $desc;

    /**
     *
     * @var double
     */
    public $value;

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
     *
     * @var string
     */
    public $store;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Cart', 'item', array('alias' => 'Cart'));
        $this->hasMany('id', 'Ireview', 'item', array('alias' => 'Ireview'));
        $this->hasMany('id', 'Itempics', 'item', array('alias' => 'Itempics'));
        $this->hasMany('id', 'Itemsxinvoice', 'item', array('alias' => 'Itemsxinvoice'));
        $this->hasMany('id', 'Specs', 'item', array('alias' => 'Specs'));
        $this->belongsTo('store', 'Store', 'id', array('alias' => 'Store'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'items';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Items[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Items
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
