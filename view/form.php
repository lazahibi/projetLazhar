<?php include('view/partials/headerPublic.php'); ?>
	<title>Evenement - <?= $name ?></title>
</head>
<body>
    <div class="contenaire">
<header>
        <div id="infos"> 
            <?php 
                if ($req['date'] > date('Y-m-d') ):
            ?>
            <h1><?= $name ?></h1><br />
                <h5><?= $date_ev ?>' <br /> '<?= $address ?>'</h5> 
            </div>
            <?php  
                list($width, $height) = getimagesize($logo);
                if($width > $height): 
            ?>
                <img src="<?= $logo ?>" height="70">
            <?php 
                else: 
            ?>
                <img src="<?= $logo ?>" width="70">
            <?php 
                endif; 
            ?>

            </header>
            <div class="presentation">
                <p>'<?= $desc ?>'</p>
            </div>
           <div id="map"></div>
            <script>
              function initMap() {
                var uluru = {lat: <?= $lat ?>, lng: <?= $lon ?>};
                var map = new google.maps.Map(document.getElementById("map"), {
                  zoom: 15,
                  center: uluru
                });
                var marker = new google.maps.Marker({
                  position: uluru,
                  map: map
                });
              }
            </script>
            <article class="atelier">
                <h4 align="center">Liste des ateliers prévus</h4> <br />
                <div class="container">
                  <div class="row">
        <?php 
                if(!empty($req2)):
                $i = 1;
                foreach ($req2 as $data2): 
        ?>
                     <div class="col-4"> 
                        <strong> <?= $data2['name_atelier'] ?></strong> <br /> 
                        <?= $data2['desc_atelier'] ?> <br />
                    </div>
        <?php   
                $i++;
                endforeach;
                else:
        ?>
                <p align="center">Aucun atelier de prévu.</p>
        <?php
                endif;
        ?>
                  </div>
                </div>
            </article>

            <article>
                <form class="col s12" action="index.php?<?= base64_encode("action=sendForm&page=PublicController&id=".$id) ?>" method="post">
                    <div class="row">
                        <div class="input-field col s6">
                          <input id="first_name" name="lastname" type="text" class="validate">
                          <label for="first_name">Prénom</label>
                        </div>
                        <div class="input-field col s6">
                          <input id="last_name" name="name" type="text" class="validate">
                          <label for="last_name">Nom</label>
                        </div>
                    </div>
                    <div class="input-field">
                    <input type="text" name="fonction">
                    <label for="fonction">Fonction</label>
                    </div>

                    <div class="input-field">
                    <input type="text" name="mail" class="input-field">
                    <label for="mail">Adresse mail</label>
                    </div>

                    <div class="input-field">
                    <input type="text" name="tel" class="input-field">
                    <label for="tel">Numéro téléphone</label>
                    </div>
                    
                    <p>
                        <label>
                            <input type="radio" id="part1" name="participation" value="oui"> <span>Je participerai à cet événement.</span>
                        </label>
                    </p>
                    <p>
                        <label>
                    <input type="radio" id="part2" name="participation" value="non"> <span>Je ne participerai pas à cet événement.</span>
                        </label>
                    </p>
                    <div class="disponibilite">
                        <br />
                        <?php 
                        if ($dej == "oui"): 
                        ?>
                        <br /> <h3>Dejeuner :</h3> <br />
                        <p><label><input type="radio" id="hid" name="dej" value="oui"> <span>Je resterai pour le déjeuner</span></label></p>
                        <p><label><input type="radio" id="hid" name="dej" value="non"><span>Je ne resterai pas pour le déjeuner</span></label></p>
                        <?php
                        else :?> <input type="hidden" id="hid" name="dej" value="non">
                        <?php
                        endif;
                        if ($din == "oui"):
                        ?>
                        <br /> <h3>Diner :</h3> <br />
                        <p><label><input type="radio" id="hid" name="din" value="oui"> <span>Je resterai pour le dîner</span></label></p>
                        <p><label><input type="radio" id="hid" name="din" value="non"> <span>Je ne resterai pas pour le dîner</span></label></p>
                        <?php
                        else: ?> <input type="hidden" id="hid" name="din" value="non"> <?php
                        endif;
                        ?>
                    </div>
                        </article>
                        <div class="input">
                        <input type="submit" value="Envoyer">
                    </div>
                </form>
            </article>
        </div>

   <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfNKKTWKwxWhf1DCELpzYyK_KPQjqSQi4&callback=initMap">
    </script>
    <script type="text/javascript" src="src/js/functions.js"></script>
            <?php
                 else:
            ?>
                 <h3 align="center">Cet évenement est passé !</h3>
            <?php                      
                endif;
            ?>
</body>

</html>