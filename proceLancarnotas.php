<?php
session_start();
include_once("conexao.php");

//echo $_SERVER['REQUEST_URI'];
$dados=explode("?", $_SERVER['REQUEST_URI']);
$dados=$dados[1];

$count_idEstudante=substr_count($dados, "idEstudante");
$i=1;
$contArray=0;
$Notas=explode("&", $dados);
while ($i<=$count_idEstudante ) {
	$valor1=$Notas[$contArray];
	$idEstudante=explode("=", $valor1);
	$idEstudante=$idEstudante[1];
	$contArray++;
// echo $idEstudante;
	$valor1=$Notas[$contArray];
	$texte1=explode("=", $valor1);
	$texte1=$texte1[1];
	$contArray++;
//echo "<br>".$texte1;
	$valor1=$Notas[$contArray];
	$texte2=explode("=", $valor1);
	$texte2=$texte2[1];
	$contArray++;
//echo "<br>".$texte1;
	$valor1=$Notas[$contArray];
	$texte3=explode("=", $valor1);
	$texte3=$texte3[1];
	$contArray++;
//echo "<br>".$texte1;
	$valor1=$Notas[$contArray];
	$AP=explode("=", $valor1);
	$AP=$AP[1];
	$contArray++;

//echo "<br>".$TP;
	$valor1=$Notas[$contArray];
	$idNota=explode("=", $valor1);
	$idNota=$idNota[1];
	$contArray++;
//echo "<br>".$idNota."<br><br>";

$Trimestre=$_SESSION['Trimestre'];
$id_Relacao=$_SESSION['id_Relacao'];


if (is_numeric($idNota)) {
	$classificacao= $texte1.$texte2.$texte3.$AP;
	if (substr_count(strtolower($classificacao),"v")>1)
		$classificacao = 'Reprovado';
	elseif(strlen($classificacao)<1)
		$classificacao = '';
	else
		$classificacao = 'Aprovado';
try {
	$sql = "UPDATE `tabela_notas` SET `Teste1` = '$texte1', `Teste2` = '$texte2',`Teste3` = '$texte3', `AP` = '$AP', `classificacao` = '$classificacao', `DataModificacao` = NOW() WHERE `tabela_notas`.`idNota` = $idNota";
	
	$query=mysql_query($sql);
	if (mysql_affected_rows()<=0) {
		
	} else {
		print(mysql_error());
}
} catch (Exception $e) {
	
}
	
} else {
	try {
		$sql = "INSERT INTO `tabela_notas` (`idEstudante`, `id_Relacao_Disciplina`, `Teste1`, `Teste2`, `Teste3`, `AP`,  `Trimestre`, `DataCadastro`, `DataModificacao`) VALUES ('$idEstudante', '$id_Relacao', '$texte1', '$texte2', '$texte3','$AP', '$Trimestre', NOW(),null)";
		$query=mysql_query($sql);	
		if ($query) {
		      $_SESSION['mensagem'] = "
													<p></p>
													<div class='divH'>
														<div class='alert alert-success' role='alert'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> 
															Notas atualizadas com sucesso!
														</div>
												   	</div>";
		
		} else {
			print(mysql_error());
		}
	} catch (Exception $e) {
		
	}
	
}

	$i++;
}
header("Location: lancarnotas.php");
$idEstudante= $_GET['idEstudante'];
$idNota= $_GET['idNota'];
$texte1 = $_GET['nota1'];
$texte2 = $_GET['nota2'];
$texte3 = $_GET['nota3'];
$AP = $_GET['AP'];


/*
*/


?>