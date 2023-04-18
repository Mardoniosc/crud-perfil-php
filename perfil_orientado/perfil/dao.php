<?php
/*
    Criação da classe Perfil com o CRUD
*/
class PerfilDAO
{

    public function create(Perfil $perfil)
    {
        try {
            $sql = "INSERT INTO perfil (nome) VALUES(:nome)";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $perfil->getNome());
            return $p_sql->execute();
        } catch (Exception $e) {
            // print_r($e);
            header("Location: ../lista.php?action=cadastrar&msg=error");
        }
    }

    public function read()
    {
        try {
            $sql = "SELECT * FROM perfil order by nome asc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaPerfils($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            header("Location: ./lista.php?action=buscar&msg=error");
        }
    }

    public function readById(Perfil $perfil)
    {
        try {
            $sql = "SELECT id, nome FROM perfil WHERE id=:id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $perfil->getId());
            $p_sql->execute();
            $result = $p_sql->fetchAll(PDO::FETCH_OBJ);
            $perfil->setId($result[0]->id);
            $perfil->setNome($result[0]->nome);
            return $perfil;
        } catch (Exception $e) {
            header("Location: ./lista.php?action=buscar&msg=error");
        }
    }

    public function update(Perfil $perfil)
    {
        try {
            $sql = "UPDATE perfil set
                
                  nome=:nome                  
                                                                       
                  WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $perfil->getNome());

            $p_sql->bindValue(":id", $perfil->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            header("Location: ./lista.php?action=atualizar&msg=error");
        }
    }

    public function delete(Perfil $perfil)
    {
        try {
            $sql = "DELETE FROM perfil WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $perfil->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            header("Location: ./lista.php?action=deletar&msg=error");
        }
    }




    private function listaPerfils($row)
    {
        $perfil = new Perfil();
        $perfil->setId($row['id']);
        $perfil->setNome($row['nome']);


        return $perfil;
    }
}
