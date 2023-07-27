<?php 
 class Menu{

    public $pdo;

    public function __construct()
    {
        try{
            $this->pdo = new PDO("mysql:dbname=db_pizzaria;host=localhost","root","");
        }catch(PDOException $e){
            echo "Erro com o banco de dados: " . $e->getMessage() ."<br>"; 
        }catch(PDOException $e){
            echo "Erro genérico: " . $e->getMessage() ."<br>"; 
        }
    }

    public function listaTabela($table){
        $res = array();
        $cmd = $this->pdo->query("SELECT * FROM {$table} ORDER BY id ASC");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function pegaTodosMenus(){
        $result = array();
        $cmd = $this->pdo->query("SELECT id,folder,nome FROM menu");
        $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
            
}








 












?>