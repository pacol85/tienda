<?php

class Invoice extends \Phalcon\Mvc\Model
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
    public $code;

    /**
     *
     * @var string
     */
    public $cdate;

    /**
     *
     * @var string
     */
    public $saddress;

    /**
     *
     * @var string
     */
    public $caddress;

    /**
     *
     * @var string
     */
    public $total;

    /**
     *
     * @var string
     */
    public $shipping;

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
        $this->hasMany('id', 'Itemsxinvoice', 'invoice', array('alias' => 'Itemsxinvoice'));
        $this->belongsTo('user', 'Users', 'id', array('alias' => 'Users'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'invoice';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Invoice[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Invoice
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
