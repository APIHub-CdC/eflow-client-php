<?php

namespace EFLOW\Client\Model;

use \ArrayAccess;
use \EFLOW\Client\ObjectSerializer;

class Peticion implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $EFLOWModelName = 'Peticion';
    
    protected static $EFLOWTypes = [
        'folio' => 'string',
        'tipo_documento' => 'string',
        'numero_documento' => 'string'
    ];
    
    protected static $EFLOWFormats = [
        'folio' => null,
        'tipo_documento' => null,
        'numero_documento' => null
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
        'tipo_documento' => 'tipoDocumento',
        'numero_documento' => 'numeroDocumento'
    ];
    
    protected static $setters = [
        'folio' => 'setFolio',
        'tipo_documento' => 'setTipoDocumento',
        'numero_documento' => 'setNumeroDocumento'
    ];
    
    protected static $getters = [
        'folio' => 'getFolio',
        'tipo_documento' => 'getTipoDocumento',
        'numero_documento' => 'getNumeroDocumento'
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
        $this->container['tipo_documento'] = isset($data['tipo_documento']) ? $data['tipo_documento'] : null;
        $this->container['numero_documento'] = isset($data['numero_documento']) ? $data['numero_documento'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if ($this->container['tipo_documento'] === null) {
            $invalidProperties[] = "'tipo_documento' can't be null";
        }
        if ((mb_strlen($this->container['tipo_documento']) > 2)) {
            $invalidProperties[] = "invalid value for 'tipo_documento', the character length must be smaller than or equal to 2.";
        }
        if ($this->container['numero_documento'] === null) {
            $invalidProperties[] = "'numero_documento' can't be null";
        }
        if ((mb_strlen($this->container['numero_documento']) > 12)) {
            $invalidProperties[] = "invalid value for 'numero_documento', the character length must be smaller than or equal to 12.";
        }
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
    
    public function getTipoDocumento()
    {
        return $this->container['tipo_documento'];
    }
    
    public function setTipoDocumento($tipo_documento)
    {
        if ((mb_strlen($tipo_documento) > 2)) {
            throw new \InvalidArgumentException('invalid length for $tipo_documento when calling Peticion., must be smaller than or equal to 2.');
        }
        $this->container['tipo_documento'] = $tipo_documento;
        return $this;
    }
    
    public function getNumeroDocumento()
    {
        return $this->container['numero_documento'];
    }
    
    public function setNumeroDocumento($numero_documento)
    {
        if ((mb_strlen($numero_documento) > 12)) {
            throw new \InvalidArgumentException('invalid length for $numero_documento when calling Peticion., must be smaller than or equal to 12.');
        }
        $this->container['numero_documento'] = $numero_documento;
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
