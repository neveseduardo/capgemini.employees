<?php

namespace App\Model;

use App\Model\Workstation;
use App\Model\Lotation;

class Employee {

    private $id;
    private $nome;
    private $data_nascimento;
    private $cidade;
    private $telefone;

    /**
     * @var type App\Model\Workstation
     */
    private $workstation;
    /**
     * @var type App\Model\Lotation
     */
    private $lotation;

    function __construct($id, $nome, $data_nascimento, $cidade, $telefone, Workstation $workstation, Lotation $lotation) {
        $this->id = $id;
        $this->nome = $nome;
        $this->data_nascimento = $data_nascimento;
        $this->cidade = $cidade;
        $this->telefone = $telefone;
        $this->workstation = $workstation;
        $this->lotation = $lotation;
    }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getData_nascimento() {
        return $this->data_nascimento;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getWorkstation(): Workstation {
        return $this->workstation;
    }

    function getLotation(): Lotation {
        return $this->lotation;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setData_nascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setWorkstation(Workstation $workstation) {
        $this->workstation = $workstation;
    }

    function setLotation(Lotation $lotation) {
        $this->lotation = $lotation;
    }
}
