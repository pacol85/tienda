<?php

class Later extends \Phalcon\Mvc\Model
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
    public $cant;

    /**
     *
     * @var string
     */
    public $user;

    /**
     *
     * @var string
     */
    public $item;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('item', 'Items', 'id', array('alias' => 'Items'));
        $this->belongsTo('user', 'Users', 'id', array('alias' => 'Users'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'later';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Later[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Later
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
