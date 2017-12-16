<?php

class Itemsxinvoice extends \Phalcon\Mvc\Model
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
    public $invoice;

    /**
     *
     * @var integer
     */
    public $cant;

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
        $this->belongsTo('invoice', 'Invoice', 'id', array('alias' => 'Invoice'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'itemsxinvoice';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Itemsxinvoice[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Itemsxinvoice
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
