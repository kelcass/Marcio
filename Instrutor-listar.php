<?php
	include_once("principal.php");

	
?>

<?php
	if(isset($_SESSION['mensagem'])){
		echo $_SESSION['mensagem'];
		unset($_SESSION['mensagem']);
	}
?>
<?php
 
if (isset($_POST['buscar'])) {
    $pesquisar = $_POST['PalavraChave'];
    $resultado = mysql_query("select * from Professor where Nome LIKE '$pesquisar%' or `Apelido` LIKE '$pesquisar%'");
    unset($_POST['buscar']);
}else{
	$resultado = mysql_query("SELECT * FROM Professor ORDER BY 'ID'");
	
}



?>

	<div class="container-fluid">
<div class="row-fluid">
<div class="col col-lg-H col-md-H col-sm-H haggy">
    <div class="panel panel-default panel-table">
        <div class="panel-heading" >
            
              <p>
              	
                	<div class="divH"><label>Professores</label></div>
                	<div class="text-right divH">
                		<a href="instrutor-cadastro.php?usuarioId=<?php echo $_SESSION['usuarioId'] ?>"><button type='button' class='text-right btn btn-sm btn-info'><span class="glyphicon glyphicon-plus"></span> </button></a>
                	</div>
                
              </p> 
        </div>	 
        <div class="panel-body">
			
					<form name="form2" class="hidden" method="post" action="">
						<div class="col-sm-3 form-group" >
							<input type="text" class="input-sm form-control" name="PalavraChave" maxlength="30" size='25' placeholder="Numero do processo ou nome" required="">
				    	</div>
				   		<div class="col-sm-1 col-md-1">
							<button class='btn btn-sm btn-success' name='buscar'><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
				    	</div>
					</form>
                 
				
             <div class="col col-xs-12 col-md-12 col-sm-12 col-lg-12">
              		<p class="hidden">
              			
								<label for="texto">Número de Professores: <?php  $num = mysql_num_rows($resultado);  echo "$num"; ?></label>
              		</p> 
            <div class="row-fluid">
            <div class="table-responsive">
			  
			<form name="form1" method="post" action="">
			   
                <table id="Tabela" class="table table-bordered table-striped  table-responsive table-hover">
                  <thead class="bg-primary">
              
					
					<th>Nome</th>
					<th>Apelido</th>
					<th>E-mail</th>
					<th>Celular</th>
					
					<th>BI</th>
					
					<th>Sexo</th>	
					
					 <th >Ações</th>
				  </tr>
				</thead>
				<tbody class="searchable">
				
			<?php   
			
							
				while($linhas= mysql_fetch_array($resultado)){
					echo "<tr>";
						
                        
						echo "<td>".$linhas['Nome']."</td>";
                        echo "<td>".$linhas['Apelido']."</td>";
						echo "<td>".$linhas['Email']."</td>";
                        echo "<td>".$linhas['Contacto']."</td>";
						
                        echo "<td>".$linhas['BI']."</td>";
						
						echo "<td>".$linhas['Sexo']."</td>";
						
						?>
						<input type="hidden" class="form-control" name="idUsuario" value="<?php echo $linhas['idUsuario'];?>">
						
						<td> 
						<a href='verProfessor.php?ID=<?php echo $linhas['ID']; ?>'><button  type='button' class='btn btn-sm btn-primary btn'><span class="glyphicon glyphicon-eye-open"></span></button></a>
						<a href='instrutor-editar.php?ID=<?php echo $linhas['ID']; ?>'><button type='button' class='btn btn-sm btn-warning btn'><span class="glyphicon glyphicon-edit"></span> Editar</button></a>
						
						<!--<button type='button' class='btn btn-sm btn-danger' data-title="Delete" data-toggle="modal" data-target="#delete" data-whatever="<?php echo $linhas['idUsuario'];?>"><span class="glyphicon glyphicon-trash"></span> Apagar</button>
						-->
						<?php
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	  </form>

	 
	
	<button type='button' onclick="Voltar()" class='btn btn-info'><span class="glyphicon glyphicon-arrow-left"></span>Voltar</button>
	
 </div>
</div>
</div>
</div>
</div> <!-- /container -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#Tabela').DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada encontrado!",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrado de _MAX_ registros total)"
        }
    	});
	});
</script>
<!-- Inicio Modal Apagar -->
				<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
				<h4 class="modal-title custom_align" id="Heading">Eliminar Dados</h4>
				</div>
				<form name="form" method="POST" action="Instrutor-processa-apagar.php">
				<div class="modal-body">
				
				
				<input type="hidden" name="idUsuario" class="form-control" id="idUsuario">
				<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Deseja Eliminar?</div>
				</div>
				<div class="modal-footer ">
				<button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Sim</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Não</button>
				 </div></div> </div></div> </form>
				<!-- Fim Modal -->


				<script type="text/javascript">
		$('#delete').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient = button.data('whatever') 
		  var modal = $(this)
		  //modal.find('.modal-title').text('Editar Usuario - idUsuario: ' + recipient)
		  modal.find('#idUsuario').val(recipient)
		
		  })
	</script>

<?php
	include_once("rodape.php");
?>