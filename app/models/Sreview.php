<?php

class Sreview extends \Phalcon\Mvc\Model
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
    public $title;

    /**
     *
     * @var string
     */
    public $review;

    /**
     *
     * @var integer
     */
    public $stars;

    /**
     *
     * @var string
     */
    public $store;

    /**
     *
     * @var string
     */
    public $user;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('store', 'Store', 'id', array('alias' => 'Store'));
        $this->belongsTo('user', 'Users', 'id', array('alias' => 'Users'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'sreview';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Sreview[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Sreview
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
