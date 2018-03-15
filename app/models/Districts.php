<?php

namespace App\Models;

class Districts extends Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="oid", type="integer", length=11, nullable=false)
     */
    public $oid;

    /**
     *
     * @var string
     * @Column(column="area_name", type="string", length=64, nullable=false)
     */
    public $area_name;

    /**
     *
     * @var integer
     * @Column(column="level", type="integer", length=11, nullable=false)
     */
    public $level;

    /**
     *
     * @var integer
     * @Column(column="parent_oid", type="integer", length=11, nullable=false)
     */
    public $parent_oid;

    /**
     *
     * @var integer
     * @Column(column="province_oid", type="integer", length=11, nullable=false)
     */
    public $province_oid;

    /**
     *
     * @var integer
     * @Column(column="city_oid", type="integer", length=11, nullable=false)
     */
    public $city_oid;

    /**
     *
     * @var integer
     * @Column(column="county_oid", type="integer", length=11, nullable=true)
     */
    public $county_oid;

    /**
     *
     * @var string
     * @Column(column="area_code", type="string", length=64, nullable=true)
     */
    public $area_code;

    /**
     *
     * @var string
     * @Column(column="simple_name", type="string", length=128, nullable=false)
     */
    public $simple_name;

    /**
     *
     * @var string
     * @Column(column="lon", type="string", length=24, nullable=false)
     */
    public $lon;

    /**
     *
     * @var string
     * @Column(column="lat", type="string", length=24, nullable=false)
     */
    public $lat;

    /**
     *
     * @var string
     * @Column(column="zip_code", type="string", length=64, nullable=true)
     */
    public $zip_code;

    /**
     *
     * @var string
     * @Column(column="whole_name", type="string", length=256, nullable=true)
     */
    public $whole_name;

    /**
     *
     * @var string
     * @Column(column="whole_oid", type="string", length=64, nullable=true)
     */
    public $whole_oid;

    /**
     *
     * @var string
     * @Column(column="pre_pin_yin", type="string", length=48, nullable=true)
     */
    public $pre_pin_yin;

    /**
     *
     * @var string
     * @Column(column="pin_yin", type="string", length=256, nullable=true)
     */
    public $pin_yin;

    /**
     *
     * @var string
     * @Column(column="simple_py", type="string", length=128, nullable=true)
     */
    public $simple_py;

    /**
     *
     * @var string
     * @Column(column="remark", type="string", length=128, nullable=true)
     */
    public $remark;

    /**
     *
     * @var double
     * @Column(column="version", type="double", nullable=false)
     */
    public $version;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("ml");
        $this->setSource("districts");

        $this->hasMany('oid', Districts::class, 'parent_oid', [
            'alias' => 'children',
            'reusable' => true
        ]);

        parent::initialize();
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'districts';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Districts[]|Districts|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Districts|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
