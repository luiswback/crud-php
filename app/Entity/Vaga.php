<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Vaga
{

    /**
     * identificador único da vaga
     * @var integer
     */

    public $id;

    /**
     * Título da vaga
     * @var string
     */

    public $title;

    /**
     * Descrição da vaga(pode conter HTML)
     * @var string
     */

    public $description;

    /**
     * Define se a vaga está ativa
     * @var string(s/n)
     */

    public $active;

    /**
     * Data de publicação da vaga;
     * @var string
     */

    public $date;

    /**
     * Método responsável por cadastrar uma vaga;
     * @return boolean
     */

    public function register()
    {
        //DEFINIR DATA
        $this->date = date('Y-m-d H:i:s');

        //INSERIR VAGA NO BANCO
        $objDatabase = new Database('vagas');
        $this->id = $objDatabase->insert([
            'title' => $this->title,
            'description' => $this->description,
            'active' => $this->active,
            'date' => $this->date,
        ]);

        return true;

        //ATRIBUIR O ID DA VAGA NA INSTÂNCIA

        //RETORNAR SUCCESS
    }

    /**
     * Método responsável por atualizar um dado no bando;
     * @return boolean
     */
    public function update()
    {
        return (new Database('vagas'))->update('id = ' . $this->id, [

            'title' => $this->title,
            'description' => $this->description,
            'active' => $this->active,
            'date' => $this->date,
        ]);
    }

    /**
     * método responsável pela exclusão da vaga no DB.
     * @return boolean
     */
    public function delete(){
        return(new Database('vagas'))->delete('id = '.$this->id);
    }

    /**
     * Método responsável por obter as vagas do DB
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getVagas($where = null, $order = null, $limit = null)
    {

        //fetchAll tranforma o retorno em array;
        return (new Database('vagas'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);

    }

    /**
     * Método responsável por buscar uma vaga com base em seu ID
     * @param integer $id
     * @return Vaga
     */
    public static function getVaga($id)
    {
        return (new Database('vagas'))->select('id = ' . $id)->fetchObject(self::class);
    }


}