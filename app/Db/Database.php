<?php

namespace App\Db;

use \PDO;

use \PDOException;
use PDOStatement;

class Database
{

    /**
     * Host de conexão com o banco de dados;
     * @var string;
     */

    const HOST = 'localhost';
    /**
     * @var string
     * * Nome do banco de dados;
     */
    const NAME = 'vagas_emprego';

    /**
     * Usuário do banco
     * @var string
     */
    const USER = 'root';

    /**
     * senha DB
     * @var string
     */
    const PASS = '';

    /**
     * nome da tabela a ser manipulada
     * @var string
     */
    private $table;

    /**
     * instancia de conexão com o banco de dados (PDO)
     * @var PDO
     */
    private $connection;

    /**
     * Define  a tabela e instância a conexão.
     * @param  string $table
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Método responsável por criar uma conexão com o banco de dados
     */
    private function setConnection(){
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $exception){
            die('ERROR: '. $exception->getMessage());
        }
    }

    /**
     * método responsável por executar querys no DB;
     * @param  string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params = []){

        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch (PDOException $exception){
            die('ERROR: '. $exception->getMessage());
        }

    }

    /**
     * MÉTODO responsável por inserir dados no banco
     * @param array $values [field => value]
     * return integer ID inserido
     */
    public function insert($values){
        //DADOS DA QUERY

        $fields = array_keys($values);
        $binds = array_pad([],count($fields), '?');

        //Montagem da query
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',', $binds).')';

        //Executa o insert
        $this->execute($query, array_values($values));

        //retorna o ID inserido;
        return $this->connection->lastInsertId();
    }

    /**
     * método responsável por executar uma consulta no banco
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*'){

        //Dados da query
        $where = strlen($where) ? 'WHERE ' .$where : '';
        $order = strlen($order) ? 'ORDER BY ' .$order : '';
        $limit = strlen($limit) ? 'LIMIT ' .$limit : '';

        //MONTA QUERY
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
        //executa a query
        return  $this->execute($query);

    }

    /**
     * Método responsável por executar a atualização no banco de dados;
     * @param  string $where
     * @param  array $values [field => value]
     * @return boolean
     */
    public function update($where, $values){
        //dados da query

        $fields = array_keys($values);


        //monta query
        $query = 'UPDATE '. $this->table.' SET '.implode('=?,', $fields).'=? WHERE '.$where;

        //executar a query

        $this->execute($query,array_values($values));

        return true;
    }

    /**
     * Método responsável por exlcuir dados do banco;
     * @param  string $where
     * @return boolean
     */
    public function delete($where){
        //monta query
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        //executa query;

        $this->execute($query);

        //retorna sucesso

        return true;

    }

}