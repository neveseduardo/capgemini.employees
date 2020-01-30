<?php

namespace App\Model;

class Workstation {
    private $nome;
    private $setor;
    
    function __construct($nome, $setor) {
        $this->nome = $nome;
        $this->setor = $setor;
    }
    
    function getNome() {
        return $this->nome;
    }

    function getSetor() {
        return $this->setor;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSetor($setor) {
        $this->setor = $setor;
    }
}
