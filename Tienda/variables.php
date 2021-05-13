<?php
class variables
{
    protected $localizacion;
    protected $horario;
    protected $whatsapp;
    protected $email;
    protected $telefono;

    public function __construct($horario, $localizacion, $whatsapp, $email, $telefono)
    {
        $this->localizacion = $localizacion;
        $this->horario = $horario;
        $this->whatsapp = $whatsapp;
        $this->email = $email;
        $this->telefono = $telefono;
    }

    public function __set($atributo, $valor)
    {
        if (property_exists("variables", $atributo)) {
            $this->$atributo = $valor;
        }
    }

    public function __get($atributo)
    {
        if (property_exists("variables", $atributo)) {
            return $this->$atributo;
        }
        return null;
    }
    
}
