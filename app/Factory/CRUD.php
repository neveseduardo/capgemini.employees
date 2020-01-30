<?php

namespace App\Factory;

use App\Factory\Database;
use App\Model\Employee;
use App\Model\Workstation;
use App\Model\Lotation;
use Faker\Factory as Faker;

class CRUD extends Database {

    public function getSaoPaulo() {
        $result = $this->connect()->query(
                'SELECT f.nome, f.data_nascimento, f.cidade, f.telefone, f.id, pt.nome as posto_nome, pt.setor, l.tempo_de_alocacao,  l.funcionarios_id, l.postos_de_trabalho_id FROM funcionarios f INNER JOIN lotacao l ON f.id = l.funcionarios_id INNER JOIN postos_de_trabalho pt ON pt.id = l.postos_de_trabalho_id WHERE l.postos_de_trabalho_id = 1 AND l.tempo_de_alocacao < date_sub(now(), interval 1 month)'
        );
        $employee = [];
        $count = 0;

        while ($linha = $result->fetch(\PDO::FETCH_ASSOC)) {
            /**
             * @var type App\Model\Workstation
             */
            $workstation = new Workstation($linha['posto_nome'], $linha['setor']);
            /**
             * @var type App\Model\Lotation
             */
            $lotation = new Lotation($linha['funcionarios_id'], $linha['postos_de_trabalho_id'], $linha['tempo_de_alocacao']);
            /**
             * @var type App\Model\Employee
             */
            $employee[$count] = new Employee($linha['id'], $linha['nome'], $linha['data_nascimento'], $linha['cidade'], $linha['telefone'], $workstation, $lotation);
            $count++;
        }

        return $employee;
    }

    public function getAll() {
        $result = $this->connect()->query(
                'SELECT f.nome, f.data_nascimento, f.cidade, f.telefone, f.id, pt.nome as posto_nome, pt.setor, l.tempo_de_alocacao,  l.funcionarios_id, l.postos_de_trabalho_id ' .
                'FROM funcionarios f ' .
                'INNER JOIN lotacao l ON f.id = l.funcionarios_id ' .
                'INNER JOIN postos_de_trabalho pt ON pt.id = l.postos_de_trabalho_id');

        $employee = [];
        $count = 0;

        while ($linha = $result->fetch(\PDO::FETCH_ASSOC)) {
            /**
             * @var type App\Model\Workstation
             */
            $workstation = new Workstation($linha['posto_nome'], $linha['setor']);
            /**
             * @var type App\Model\Lotation
             */
            $lotation = new Lotation($linha['funcionarios_id'], $linha['postos_de_trabalho_id'], $linha['tempo_de_alocacao']);
            /**
             * @var type App\Model\Employee
             */
            $employee[$count] = new Employee($linha['id'], $linha['nome'], $linha['data_nascimento'], $linha['cidade'], $linha['telefone'], $workstation, $lotation);
            $count++;
        }
        return $employee;
    }

    public function insert() {
        $this->clearAll();
        $this->createtables();
        $this->insertInEmployees();
        $this->insertInWorkstations('São Paulo');
        $this->insertInWorkstations('Belo Horizonte');
        $this->insertInLotations();
    }

    public function clearAll() {
        $this->connect()->prepare('DROP TABLE IF EXISTS funcionarios')->execute() or die(print_r($stmt->errorInfo(), true));
        $this->connect()->prepare('DROP TABLE IF EXISTS lotacao')->execute() or die(print_r($stmt->errorInfo(), true));
        $this->connect()->prepare('DROP TABLE IF EXISTS postos_de_trabalho')->execute() or die(print_r($stmt->errorInfo(), true));
    }

    public function insertInLotations() {
        $stmt = $this->connect()->prepare('INSERT INTO lotacao (funcionarios_id, postos_de_trabalho_id, tempo_de_alocacao) VALUES (?,?,?)');
        $stmt->bindValue(1, 1);
        $stmt->bindValue(2, 1);
        $stmt->bindValue(3, '2019-12-29 14:10:51');
        $stmt->execute() or die(print_r($stmt->errorInfo(), true));

        foreach (range(2, 8) as $i) {
            $stmt = $this->connect()->prepare('INSERT INTO lotacao (funcionarios_id, postos_de_trabalho_id) VALUES (?,?)');
            $stmt->bindValue(1, $i);
            $stmt->bindValue(2, $i < 4 ? 1 : 2 );
            $stmt->execute() or die(print_r($stmt->errorInfo(), true));
        }
    }

    public function insertInWorkstations($setor) {
        $faker = Faker::create();

        $stmt = $this->connect()->prepare('INSERT INTO postos_de_trabalho (nome, setor) VALUES (?,?);');
        $stmt->bindValue(1, $faker->name());
        $stmt->bindValue(2, $setor);
        $stmt->execute() or die(print_r($stmt->errorInfo(), true));
    }

    public function insertInEmployees() {
        $faker = Faker::create();

        foreach (range(1, 8) as $i) {
            $stmt = $this->connect()->prepare('INSERT INTO funcionarios (nome, data_nascimento, cidade, telefone) VALUES (?,?,?,?)');
            $stmt->bindValue(1, $faker->name());
            $stmt->bindValue(2, '23/12/1990');
            $stmt->bindValue(3, 'Belém');
            $stmt->bindValue(4, '(91) 98888-8888');
            $stmt->execute() or die(print_r($stmt->errorInfo(), true));
        }
    }

    public function createtables() {
        $this->createEmployees();
        $this->createWorkstations();
        $this->createloLations();
    }

    public function createEmployees() {
        $this->connect()->prepare(
                        'CREATE TABLE IF NOT EXISTS funcionarios ( 
	id INT NOT NULL AUTO_INCREMENT, 
	nome VARCHAR(255) NOT NULL,
	data_nascimento VARCHAR(10) NOT NULL,
	cidade VARCHAR(255) NOT NULL,
	telefone VARCHAR(15) NOT NULL,
	PRIMARY KEY ( id )
        ) CHARACTER SET utf8 COLLATE utf8_unicode_ci;')->execute() or die(print_r($stmt->errorInfo(), true));
    }

    public function createWorkstations() {
        $this->connect()->prepare(
                        'CREATE TABLE IF NOT EXISTS postos_de_trabalho ( 
        id INT NOT NULL AUTO_INCREMENT, 
        setor VARCHAR(255) NOT NULL,
        nome VARCHAR(255) NOT NULL,
        PRIMARY KEY ( id )
        ) CHARACTER SET utf8 COLLATE utf8_unicode_ci; ')->execute() or die(print_r($stmt->errorInfo(), true));
    }

    public function createloLations() {
        $this->connect()->prepare(
                        'CREATE TABLE IF NOT EXISTS lotacao (
        id INT NOT NULL AUTO_INCREMENT,
        funcionarios_id INTEGER NOT NULL,
        postos_de_trabalho_id  INTEGER NOT NULL,
        tempo_de_alocacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(id),
        FOREIGN KEY(funcionarios_id) REFERENCES funcionarios(id) ON DELETE CASCADE,
        FOREIGN KEY(postos_de_trabalho_id) REFERENCES postos_de_trabalho(id) ON DELETE CASCADE
        ) CHARACTER SET utf8 COLLATE utf8_unicode_ci;')->execute() or die(print_r($stmt->errorInfo(), true));
    }

}
