<?php

class Specs extends \Phalcon\Mvc\Model
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
    public $text;

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
        return 'specs';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Specs[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Specs
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
