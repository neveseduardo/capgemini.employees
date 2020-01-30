<?php

namespace App\Model;

class Lotation {
    private $funcionario_id;
    private $posto_de_trabalho_id;
    private $tempo_de_alocacao;
    
    function __construct($funcionario_id, $posto_de_trabalho_id, $tempo_de_alocacao) {
        $this->funcionario_id = $funcionario_id;
        $this->posto_de_trabalho_id = $posto_de_trabalho_id;
        $this->tempo_de_alocacao = $tempo_de_alocacao;
    }
    
    function getFuncionario_id() {
        return $this->funcionario_id;
    }

    function getPosto_de_trabalho_id() {
        return $this->posto_de_trabalho_id;
    }

    function getTempo_de_alocacao() {
        return $this->tempo_de_alocacao;
    }

    function setFuncionario_id($funcionario_id) {
        $this->funcionario_id = $funcionario_id;
    }

    function setPosto_de_trabalho_id($posto_de_trabalho_id) {
        $this->posto_de_trabalho_id = $posto_de_trabalho_id;
    }

    function setTempo_de_alocacao($tempo_de_alocacao) {
        $this->tempo_de_alocacao = $tempo_de_alocacao;
    }



    
}
