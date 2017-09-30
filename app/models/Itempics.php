<?php

class Itempics extends \Phalcon\Mvc\Model
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
    public $item;

    /**
     *
     * @var string
     */
    public $pic;

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
        $this->belongsTo('item', 'Items', 'id', array('alias' => 'Items'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'itempics';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Itempics[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Itempics
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
