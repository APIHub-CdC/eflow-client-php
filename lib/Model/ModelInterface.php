<?php

namespace EFLOW\Client\Model;

interface ModelInterface
{
    
    public function getModelName();
    
    public static function EFLOWTypes();
    
    public static function EFLOWFormats();
    
    public static function attributeMap();
    
    public static function setters();
    
    public static function getters();
    
    public function listInvalidProperties();
    
    public function valid();
}
