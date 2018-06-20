<?php
	include('view/partials/header.php');
?>
<script type="text/javascript" src="src/js/functions.js"></script>
	<div class="contenue">
		<table class="table">
        <thead>
        <tr> <th>Logo</th> <th>Nom</th> <th>Date</th><th>Nombre de participants</th><th>nbr couverts déjeuné</th><th>nbr couverts diner</th><th>Moyenne donnée</th><th>Moyenne par Atelier</th></tr>
        </thead>
        <tbody>
    <?php
    	$i = 0;
        while ($data = $req->fetch()):

    ?>

        <tr> 
            <td> <img width="100" src="<?= $data['logo'] ?>"/></td>
            <td><?= $data['name_ev'] ?></td>
            <td><?= date('d/m/Y',strtotime($data['date_ev'])) ?></td> 
            <td><?= $participant[$i][0] ?> ( / <?= $maxParticipant[$i][0] ?> réponse(s) )</td>
            <td><?= $nbrDej[$i][0] ?></td>
            <td><?= $nbrDin[$i][0] ?></td>
            <td><?= round($avg[$i][0], 2) ?> (<?= $nbrNote[$i][0] ?>)</td>
            <td>   
    <?php
        if(!empty($nameAt[$i])):
            $l = 0;
            while ($l < count($nameAt[$i])):
    ?>      
                <div>
                    <?= $nameAt[$i][$l] ?> :
                    <?= $avgAt[$i][$l] ?> (WIP) <br />
                </div>
    <?php
            $l++;
            endwhile;
        else:
    ?>
                <p>Aucun atelier pour cet événement</p>
    <?php
        endif;
    ?></td>
        </tr>
    <?php
    	$i++;
    	endwhile;
    ?>
    </tbody>
    </table>
	</div>
</body>
</html>