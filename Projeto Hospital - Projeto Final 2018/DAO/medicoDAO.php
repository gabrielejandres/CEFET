<?php
include_once '../model/Medico.php';
include_once '../dao/Conexao.php';

class MedicoDAO{
    function adicionar($medico){
        try{
            $pdo = Conexao::connect();
            $sql = 'INSERT Medico (nome, area) VALUES (:nome, :area)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':nome' => $medico->getNome(),
                ':area' => $medico->getArea()
            ));
        } catch(PDOException $e) {
            echo 'Error: '. $e->getMessage();
        }
    }


    public function listar($area){
        $area = '%' . $area . '%';
        try {
            $pdo = Conexao::connect();
            $sql = 'SELECT id,nome,area FROM medico where area like :area';
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':area' => $area
            ));
            $medicos = array();

            while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                $medico = new Medico($linha['nome'], $linha['area']);
                $medico->setId($linha['id']);
                $medicos[] = $medico;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $medicos;
    }
    
    public function listarTodos(){
        try {
            $pdo = Conexao::connect();
            $sql = 'SELECT id,nome,area FROM medico order by area';
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(

            ));
            $medicos = array();
            
            while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                $medico = new Medico($linha['nome'], $linha['area']);
                $medico->setId($linha['id']);
                $medicos[] = $medico;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $medicos;
    }

       public function listarUm($id)
    {
        try {
            $pdo = Conexao::connect();
            $sql = 'SELECT id,nome,area FROM medico where id = :id';
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':id' => $id,
            ));
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $medico = new Medico($linha['nome'], $linha['area']);
                $medico->setId($linha['id']);
            }
        } catch (PDOException $e) {
            throw $e;
        }
        return $medico;
    }
}
