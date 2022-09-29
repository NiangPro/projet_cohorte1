<?php

class Pret{
    private $codeMembre;
    private $codeDoc;
    private $datePret;
    private $dateRetour;

    public function __construct($codeMembre, $codeDoc, $datePret, $dateRetour)
    {
        $this->codeMembre = $codeMembre;
        $this->codeDoc = $codeDoc;
        $this->datePret = $datePret;
        $this->dateRetour = $dateRetour;
    }

    public function getCodeMembre(){return $this->codeMembre;}
    public function getCodeDoc(){return $this->codeDoc;}
    public function getDatePret(){return $this->datePret;}
    public function getDateRetour(){return $this->dateRetour;}
}