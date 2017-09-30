<?php

class Parameters extends \Phalcon\Mvc\Model
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
    public $param;

    /**
     *
     * @var string
     */
    public $value;

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
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'parameters';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Parameters[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Parameters
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
