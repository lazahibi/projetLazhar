<?php include('view/partials/header.php'); ?>
<head>
	<link rel='stylesheet' href='src/css/fullcalendar.css' />
	<script src='src/js/moment.js'></script>
	<script src='src/js/fullcalendar.js'></script>
	<script src='src/js/fr.js'></script>
	<script src="src/js/functions.js"></script>

</head>

	<div class="contenue container">
		<div class="row">
		<div id='calendar' class="col-md-10"></div>
  </div>
  <div class="row">
		<div class="nextEv col-md-5">
			<table>
				<tr><th>Prochain evenement :</th></tr>
				<tr><td>
					<h4><?= $nextEv ?></h4> le <?= $dateEv ?>
				</td></tr>
				<tr><td>
					Nombre de participants : <h4> <?= $particip ?> </h4>
				</td></tr>	
			</table>
    </div>
    <div class="nextEv col-md-5">
      <table>
        <tr><th>Evenement précédent :</th></tr>
        <tr><td>
          <h4><?= $prevEv ?></h4> le <?= $prevDateEv ?>
        </td></tr>
        <tr><td>
          Nombre de participants : <h4> <?= $prevParticip ?> </h4>
        </td></tr>  
        <tr><td>
          Moyenne de satisfaction : <h4> <?= round($avg, 2) ?>(<?= $nbr ?>) </h4>
        </td></tr>  
      </table>
	</div>
</div>

  <script type="text/javascript">
                 $(function() {
                      $("#calendar").fullCalendar({
                             aspectRatio: 2.5,
                             events: [
                  <?php
                    while ($data = $req->fetch()):
                  ?>
                        {
                          title  : "<?= $data['name_ev'] ?>",
                          start  : "<?= $data['date_ev'] ?>",
                        },
                   <?php
                    endwhile;
                   ?>
                        {
                          title  : "",
                          start  : "",
                        }
                      ]
                      })

                    });
                    </script>
</body>
</html>