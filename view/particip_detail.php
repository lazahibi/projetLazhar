<table class="table">
	<thead>
		<tr> 
	   		<th>Nom</th> <th>Prénom</th> <th>Fonction</th> <th>Téléphone</th> <th>Mail</th> <th>Participation?</th> <th>Dejeuné?</th>  <th>Diner?</th> <th>Disponibiilité</th> <th>Modifications</th>
	   	</tr>
	</thead>
	<tbody>
	<?php
			if(!empty($info[$i])):
			  	foreach ($info[$i] as $data):
	?>
					<tr> 
				    	<td><?= $data['name'] ?></td>
				    	<td><?= $data['lastname'] ?></td> 
				    	<td><?= $data['fonction'] ?></td> 
				    	<td><?= $data['tel'] ?></td> 
				    	<td><?= $data['mail'] ?></td> 
				    	<td><?= $data['particip'] ?></td>
				    	<td><?= $data['dej'] ?></td> 
				    	<td><?= $data['din'] ?></td> 
				        <td><?= $data['am'] ?> <?= $data['pm'] ?></td>
				    	<td> 
						<a href="index.php?<?= base64_encode("action=readUpdateParticip&page=AdminController&id=".$data['id']) ?>">Modifier<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
				    	<a href="index.php?<?= base64_encode("page=AdminController&id=".$data['id']."&action=deleteParticip") ?>" style="color:red">Supprimer<i class="fa fa-trash-o" aria-hidden="true"></i></a> </td> 
				    	</td> 
				    </tr>
	<?php
				endforeach;
			else: 
	?>
				<td colspan="10"><h5>Aucune participation pour le moment.</h5></td>
	<?php
			endif;
	?>

	</tbody>
</table>