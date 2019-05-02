<?php
ini_set("display_errors",0);error_reporting(0);
$message = '';

if(isset($_GET['recherche'])){
$teste =$_GET['recherche'];
}

if (isset($teste)) {

$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=".$teste."&lang=fr&appid=307cadcdfe005682b17ba8bc0e4b9a2a&lang=fr&units=metric";

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
}

  


?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Metéo php</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">

  <link href="css/easy-autocomplete.min.css" rel="stylesheet">
   <link href="css/easy-autocomplete.themes.min.css" rel="stylesheet">
   <link href="css/jquery-ui.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-12s col-sm-12 text-center text-uppercase"></div>
    <div class="col-lg-4 col-md-12 col-sm-12 text-center text-uppercase"><p style="font-size: 30px">Metéo des villes</p> <br><p style="font-size: 15px"> saisir une ville </p> </div><br>
    <div class="col-lg-4 col-md-12 col-sm-12 text-center text-uppercase"></div>
  </div>

</div>

  <div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-12s col-sm-12 text-center text-uppercase"></div>

    <div class="col-lg-4 col-md-12 col-sm-12 text-center text-uppercase">

  <form  method="get" autocomplete="on" action="." class="form-inline md-form form-sm active-pink-2 mt-2">
  <input class="form-control form-control-sm mr-3 w-75" id="recherche" type="Search" name="recherche" placeholder="New-york , paris" aria-label="Search">
  <i class="fas fa-search" aria-hidden="true"></i>
</form>

    </div>

    <div class="col-lg-4 col-md-12 col-sm-12 text-center text-uppercase"></div>
  </div>
</div>

  <div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-12s col-sm-12 text-center text-uppercase"></div>
    <div class="col-lg-4 col-md-12 col-sm-12 text-center text-uppercase">
      <div class="recherche2 container text-center">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 text-center text-uppercase">
    <div class="report-container">
        <h2>A <?php echo $data->name; ?> il fait ce temps :</h2>
        <div class="time">
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>
        </div>
        <div class="affichage">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon"  /> <?php echo $data->main->temp_max; ?>&deg;C<span
                class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;C</span>

        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div>

        </div>
  </div>
</div>

    </div> </div><br>
    <div class="col-lg-4 col-md-12 col-sm-12 text-center text-uppercase"></div>
  </div>






  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
   <script type="text/javascript" src="js/jquery-ui.min.js"></script>

  <script type="text/javascript" src="js/jquery.easy-autocomplete.min.js"></script>

  <script type="text/javascript" src="js/javascript.js"></script>

</body>

</html>