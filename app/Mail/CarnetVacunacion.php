<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CarnetVacunacion extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre = null;
    public $porcentaje = null;
    public $cod_alum = null;
    public $nota_credito = null;
    public $modalidad = null;

    public function __construct($nombre ,$porcentaje, $cod_alum, $nota_credito, $modalidad)
    {
        $this->nombre = $nombre;
        $this->porcentaje = $porcentaje;
        $this->cod_alum = $cod_alum;
        $this->nota_credito = $nota_credito;
        $this->modalidad = $modalidad;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $nombre = $this->nombre;
        $porcentaje = $this->porcentaje;
        $cod_alum = $this->cod_alum;
        $nota_credito = $this->nota_credito;
        $modalidad = $this->modalidad;

        return $this->subject('Universidad Ecotec | Reactiva2')->view('mailing.email', compact('nombre','porcentaje','cod_alum','nota_credito','modalidad'));
    }
}
