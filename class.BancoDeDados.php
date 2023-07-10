<?php
class BancoDeDados
{
    private $host;
    private $usuario;
    private $senha;
    private $banco;
    private $conexao;
    private $resultado;

    public function __construct(
        $host = 'localhost',
        $usuario = 'root',
        $senha = '',
        $banco = 'aedb_quinto'
    ) {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->host = $host;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->banco = $banco;
    }

    public function executarConsulta($sql)
    {
        try {
            $this->conectar();
            return $this->conexao->query($sql);
        } finally {
            $this->fecharConexao();
        }
    }

    private function conectar()
    {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

        if ($this->conexao->connect_errno) {
            die("Falha na conexão com o banco de dados: " . $this->conexao->connect_error);
        }
    }

    private function fecharConexao()
    {
        if ($this->conexao !== null) {
            $this->conexao->close();
            $this->conexao = null;
        }
    }

    protected function retornaArray($query)
    {
        $this->resultado = $this->executarConsulta($query);
        $rows = mysqli_fetch_all($this->resultado, MYSQLI_ASSOC);

        return $rows;

    // $resultado = $this->executarConsulta($query);

    // if ($resultado) {
    //     return true; // Consulta de modificação bem-sucedida
    // } else {
    //     echo "Erro na consulta SQL: " . $this->conexao->error;
    //     return false; // Consulta de modificação falhou
    // }

    }
    protected function retornando($query)
    {
        $this->resultado = $this->executarConsulta($query);
        if ($this->resultado){
            return true;
        } else {
            echo "erro na consulta: " . $this->conexao->error;
            return false;
        }

        $rows = mysqli_fetch_all($this->resultado, MYSQLI_ASSOC);
    }

}

//echo "Aqui";

$banco = new BancoDeDados();

function dumpF($string)
{
    echo "<pre>";
    var_dump($string);
    echo "</pre>";
}

#$bd = new BancoDeDados('10.0.0.1', 'admin', '123', 'aedb');
#$bd2 = new BancoDeDados();
#dumpF($bd);
#dumpf($bd2);
#$variavel = $bd2->retornaArray("select * from login");

#dumpf($variavel);
