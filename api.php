<?php
	$db = new mysqli('localhost', 'root', '123', 'felipe');
	if(mysqli_connect_errno()){
	 	echo mysqli_connect_error();
	}
	if(isset($_REQUEST['loadPage'])){
		$result = $db->query('SELECT * FROM `namoradas`');
		if($result){
		    while ($row = $result->fetch_assoc()){
		        echo '<div class="container-desc">
						<div class="select">
							<input type="checkbox" name="checks[]" value="'.$row["id"].'" />s para excluir
						</div>
						<div class="nome">
							'.$row["nome"].'
						</div>
						<div class="cor">
							<div class="show_cor">'.$row["cor"].'</div>
							<input type="text" class="edit">
						</div>
					</div>';
		    }
		    $result->free();
		}
		$db->close();
	}
	elseif(isset($_REQUEST['setColors'])){
		$result = $db->query('SELECT * FROM `namoradas`');
		if($result){
		    $options = array();
		    while ($row = $result->fetch_assoc()){
		    	$cor = $row["cor"];
		    	if (!in_array($cor, $options)){
				    array_push($options, $cor);
				}

			}
		    $total = count($options);
		    echo '<select id="select">';
		    echo "<option>Todos</option>";
		    for ($i = 0; $i <= $total - 1; $i++) {
				echo "<option>".$options[$i]."</option>";
			}
			echo '</select>';
		    $result->free();
		}
		$db->close();
	}
	elseif(isset($_REQUEST['adicionar'])){
		$array = $_REQUEST['adicionar'];
		$nome = $array['nome'];
		$cor = $array['cor'];
		$result = $db->query("INSERT INTO `namoradas` (nome, cor) VALUES ('$nome', '$cor')");
		if($result){

		    $result = $db->query('SELECT * FROM `namoradas`');
		    while ($row = $result->fetch_assoc()){
		        echo '<div class="container-desc">
						<div class="select">
							<input type="checkbox" name="checks[]" value="'.$row["id"].'" />s para excluir
						</div>
						<div class="nome">
							'.$row["nome"].'
						</div>
						<div class="cor">
							<div class="show_cor">'.$row["cor"].'</div>
							<input type="text" class="edit">
						</div>
					</div>';
		    }
		    $result->free();

		}
		$db->close();
	}elseif(isset($_REQUEST['pesquisar'])){
		$pesquisar = $_REQUEST['pesquisar'];
		$cor = $pesquisar["cor"];
		if($cor == "Todas"){
			$result = $db->query('SELECT * FROM `namoradas`');
			if($result){
			    while ($row = $result->fetch_assoc()){
			        echo '<div class="container-desc">
							<div class="select">
								<input type="checkbox" name="checks[]" value="'.$row["id"].'" />s para excluir
							</div>
							<div class="nome">
								'.$row["nome"].'
							</div>
							<div class="cor">
								<div class="show_cor">'.$row["cor"].'</div>
							<input type="text" class="edit">
							</div>
						</div>';
			    }
			    $result->free();
			}
			$db->close();
		}
		else{
			$result = $db->query("SELECT * FROM `namoradas` WHERE cor = '$cor'");
			if($result){
			    while ($row = $result->fetch_assoc()){
			        echo '<div class="container-desc">
							<div class="select">
								<input type="checkbox" name="checks[]" value="'.$row["id"].'" />s para excluir
							</div>
							<div class="nome">
								'.$row["nome"].'
							</div>
							<div class="cor">
								<div class="show_cor">'.$row["cor"].'</div>
							<input type="text" class="edit">
							</div>
						</div>';
			    }
			    $result->free();
			}
			$db->close();
		};
	}
	elseif(isset($_REQUEST['salvar'])){
		$salvar = $_REQUEST['salvar'];
		$total = count($salvar['cor']);
		$cor = $salvar['cor'];
		$nome = $salvar['nome'];
		$id = $salvar['id'];
		for ($i = 0; $i <= $total - 1; $i++) {
    		//echo "".$nome[$i]." é ".$cor[$i].".<br/>";
			$result = $db->query("UPDATE `namoradas` SET cor='$cor[$i]' WHERE id='$id[$i]'");
			$result = $db->query("SELECT * FROM `namoradas` WHERE id='$id[$i]'");
			if($result){
			    while ($row = $result->fetch_assoc()){
			        echo '<div class="container-desc">
							<div class="select">
								<input type="checkbox" name="checks[]" value="'.$row["id"].'" />s para excluir
							</div>
							<div class="nome">
								'.$row["nome"].'
							</div>
							<div class="cor">
								<div class="show_cor">'.$row["cor"].'</div>
								<input type="text" class="edit">
							</div>
						</div>';
			    }
			    $result->free();
			}
		}
		//var_dump($salvar);
		$db->close();
	}
	elseif(isset($_REQUEST['excluir'])){
		$excluir = $_GET['excluir'];
		$total = count($excluir);
		for ($i = 0; $i <= $total - 1; $i++) {
			$db->query("DELETE FROM `namoradas` WHERE id=$excluir[$i]");
		}
		$result = $db->query("SELECT * FROM `namoradas`");
			if($result){
			    while ($row = $result->fetch_assoc()){
			        echo '<div class="container-desc">
							<div class="select">
								<input type="checkbox" name="checks[]" value="'.$row["id"].'" />s para excluir
							</div>
							<div class="nome">
								'.$row["nome"].'
							</div>
							<div class="cor">
								<div class="show_cor">'.$row["cor"].'</div>
								<input type="text" class="edit">
							</div>
						</div>';
			    }
			    $result->free();
			}
		$db->close();
	}
?>