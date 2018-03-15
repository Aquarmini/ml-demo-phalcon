<?php

namespace App\Models;

class DistrictTrain extends Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var double
     * @Column(column="lat", type="double", length=10, nullable=false)
     */
    public $lat;

    /**
     *
     * @var double
     * @Column(column="lon", type="double", length=10, nullable=false)
     */
    public $lon;

    /**
     *
     * @var integer
     * @Column(column="oid", type="integer", length=20, nullable=false)
     */
    public $oid;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("ml");
        $this->setSource("district_train");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'district_train';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DistrictTrain[]|DistrictTrain|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DistrictTrain|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
