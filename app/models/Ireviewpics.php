<?php

class Ireviewpics extends \Phalcon\Mvc\Model
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
    public $pic;

    /**
     *
     * @var string
     */
    public $desc;

    /**
     *
     * @var string
     */
    public $ireview;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('ireview', 'Ireview', 'id', array('alias' => 'Ireview'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ireviewpics';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Ireviewpics[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Ireviewpics
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
