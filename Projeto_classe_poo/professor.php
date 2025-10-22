<?php
require_once "Usuario.php";

class Professor extends Usuario {
    private $diciplina;

    public function __construct($nome, $email, $diciplina) {
        parent::__construct($nome, $email);
        $this->disciplina;
    }

    public function disciplina() {
        return $this->disciplina;
    }

    public function exibirInfo() {
        return parent::exibirInfo() . " | Disciplina: {$this->disciplina}";
    }

    public function darAula() {
        return "{$this->nome} está dando aula de {$this->disciplina}.";
    }
}
?>