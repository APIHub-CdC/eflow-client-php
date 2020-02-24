<?php

namespace EFLOW\Client\Model;

use \ArrayAccess;
use \EFLOW\Client\ObjectSerializer;

class Respuesta implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $EFLOWModelName = 'Respuesta';
    
    protected static $EFLOWTypes = [
        'folio' => 'string',
        'num_consulta' => 'float',
        'ingreso_estimado' => 'float'
    ];
    
    protected static $EFLOWFormats = [
        'folio' => null,
        'num_consulta' => null,
        'ingreso_estimado' => null
    ];
    
    public static function EFLOWTypes()
    {
        return self::$EFLOWTypes;
    }
    
    public static function EFLOWFormats()
    {
        return self::$EFLOWFormats;
    }
    
    protected static $attributeMap = [
        'folio' => 'folio',
        'num_consulta' => 'numConsulta',
        'ingreso_estimado' => 'ingresoEstimado'
    ];
    
    protected static $setters = [
        'folio' => 'setFolio',
        'num_consulta' => 'setNumConsulta',
        'ingreso_estimado' => 'setIngresoEstimado'
    ];
    
    protected static $getters = [
        'folio' => 'getFolio',
        'num_consulta' => 'getNumConsulta',
        'ingreso_estimado' => 'getIngresoEstimado'
    ];
    
    public static function attributeMap()
    {
        return self::$attributeMap;
    }
    
    public static function setters()
    {
        return self::$setters;
    }
    
    public static function getters()
    {
        return self::$getters;
    }
    
    public function getModelName()
    {
        return self::$EFLOWModelName;
    }
    
    
    
    protected $container = [];
    
    public function __construct(array $data = null)
    {
        $this->container['folio'] = isset($data['folio']) ? $data['folio'] : null;
        $this->container['num_consulta'] = isset($data['num_consulta']) ? $data['num_consulta'] : null;
        $this->container['ingreso_estimado'] = isset($data['ingreso_estimado']) ? $data['ingreso_estimado'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getFolio()
    {
        return $this->container['folio'];
    }
    
    public function setFolio($folio)
    {
        $this->container['folio'] = $folio;
        return $this;
    }
    
    public function getNumConsulta()
    {
        return $this->container['num_consulta'];
    }
    
    public function setNumConsulta($num_consulta)
    {
        $this->container['num_consulta'] = $num_consulta;
        return $this;
    }
    
    public function getIngresoEstimado()
    {
        return $this->container['ingreso_estimado'];
    }
    
    public function setIngresoEstimado($ingreso_estimado)
    {
        $this->container['ingreso_estimado'] = $ingreso_estimado;
        return $this;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
