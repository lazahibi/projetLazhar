<?php
	include('view/partials/header.php');
?>
<script type="text/javascript" src="src/js/functions.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.header').nextUntil('tr.header').hide();
		$('.header').click(function(){
	    	$(this).nextUntil('tr.header').toggle();
	    	if ($('.arrow').html() == "▲"){
	    		$('.arrow').html() = "▼";
	    	} else if ($('.arrow').html() == "▼"){
	    		$('.arrow').html() == "▲";
	    	}
		});
	});

</script>
	<div class="contenue">
<table class="particip">
	<thead>
		<tr class="main">
			<th colspan="1"> </th>
			<th colspan="3">Evenement</th>
			<th colspan="3">Date</th>
			<th colspan="3">Réponses</th>
		</tr>
	   	<tr> 
	   		<th>Nom</th> <th>Prénom</th> <th>Fonction</th> <th>Téléphone</th> <th>Mail</th> <th>Participation?</th> <th>Dejeuner?</th>  <th>Diner?</th> <th>Actions</th>
	   	</tr>
   </thead>
   <tbody>
	<?php
		$i = 0;
		while ($data2 = $req->fetch()):
	?>
			<tr class='header' id='<?= $data2['name_ev'] ?>'>
				<td class='arrow' colspan="1">▲</td>
				<td colspan="3"><?= $data2['name_ev'] ?></td>
				<td colspan="3"><?= $data2['date_ev'] ?></td>
				<td colspan="3" ><?= $nbr[$i]["nbr"] ?></td>
			</tr>
			<tr>
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

				    	<td> 
						<a href="index.php?<?= base64_encode("action=readUpdateParticip&page=AdminController&id=".$data['id']) ?>">Modifier<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
				    	<a href="index.php?<?= base64_encode("page=AdminController&id=".$data['id']."&action=deleteParticip") ?>" class="confirmation" style="color:red">Supprimer<i class="fa fa-trash-o" aria-hidden="true"></i></a> </td> 
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
	<?php
		$i++;

		endwhile;
	?>

</tbody>
	</table>
	</div>
	<script type="text/javascript" src="src/js/functions.js"></script>
</body>
</html>