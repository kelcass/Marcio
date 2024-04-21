<?php
include_once("principal.php");

class medias{
	
	public $idNota;
	public $idEstudante;
    public $T1;
    public $T2;
    public $T3;
    public $AP;
    public $M;
    public $Turma;
    public $Classificacao;

    function __construct($idEstudante,$id_Relacao,$Trimestre) {
        //Buscar nota
        $sql=mysql_query("SELECT * FROM tabela_notas where idEstudante='$idEstudante' AND id_Relacao_Disciplina='$id_Relacao' ");
        $Notas=mysql_fetch_array($sql);
        $this->idNota=$Notas['idNota'];
        $this->idEstudante=$Notas['idEstudante'];
        $this->T1=$Notas['Teste1'];
        $this->T2=$Notas['Teste2'];
        $this->T3=$Notas['Teste3'];
        $this->AP=$Notas['AP'];
        $this->Classificacao=$Notas['classificacao'];
        $this->MT=(($this->T1+$this->T2+$this->T3+$this->AP)/4);
       
        $this->M= ($this->T1+$this->T2+$this->T3+$this->AP) / 4;
            //Buscar turma
        $Turmasql=mysql_query("SELECT * FROM detalhes_disciplina join tabela_turma on detalhes_disciplina.idTurma=tabela_turma.idTurma where id_Relacao='$id_Relacao'");
        $Turmasql=mysql_fetch_array($Turmasql);
        $Turma=explode(' ',$Turmasql['nomeTurma']);
        $this->Turma=$Turma[0];
    }


     function Classificacao(){
        $classificacao = $this->T1.$this->T2.$this->T3.$this->AP;
      $class='';
         if (substr_count(strtolower($classificacao),"v")>1)
             return 'Reprovado';
        elseif(strlen($classificacao)<1)
             '';
         else
            return 'Aprovado';
	}
}