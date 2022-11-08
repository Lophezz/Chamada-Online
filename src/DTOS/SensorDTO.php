<?php 

namespace App\DTOS;

class SensorDTO{

    public $_temperatura;
    public $_umidade;

    function __construct($temperatura, $umidade){
        $this->_temperatura = $temperatura;
        $this->_umidade = $umidade;
    }
    
}