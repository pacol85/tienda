<?php

class Cart extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $cant;

    /**
     *
     * @var string
     */
    public $id;

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
     *
     * @var string
     */
    public $later;

    /**
     *
     * @var string
     */
    public $price;

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
        return 'cart';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cart[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cart
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
