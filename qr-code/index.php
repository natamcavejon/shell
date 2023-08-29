<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ê-Bot  -  Enviaê</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="index.css">
</head>
<body>

  <?php
    echo "<nav id='menu-h'>";
    echo "</nav>";
	echo "<h2>Capturar QR-Code API</h2>";
	echo "<hr>";
	
  	
	if(array_key_exists('button3', $_POST)) {
		button3();
	}

	function button3() {
		sleep(2);
		$tokenQrCode = $_POST['tokenQrCode'];
		$sessaoQrCode = $_POST['sessaoQrCode'];
		$authorizationQrCode = "Authorization: Bearer " . $tokenQrCode;
		$urlQrCode = "http://localhost:21465/api/" . $sessaoQrCode . "/qrcode-session";	
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $urlQrCode ,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			$authorizationQrCode
		  ),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		echo '<img src="data:image/png;base64,'.base64_encode($response).'">';
		echo "<hr>";
	}
  	echo "<form method='post'>";
	
	echo "<nav>";
    echo "<div class='nav nav-tabs' id='nav-tab' role='tablist'>";
 	echo "<button class='nav-link' id='nav-3-tab' data-toggle='tab' data-target='#nav-3' type='button' role='tab' aria-controls='nav-3' aria-selected='false'>Capturar QRCode</button>";
	echo "</div>";
	echo "</nav>";
	echo "<div class='tab-content' id='nav-tabContent'>";
    echo "<div class='tab-pane fade show active' id='nav-3' role='tabpanel' aria-labelledby='nav-3-tab'>";
	echo "<br>";
	echo "<h4>Capturar QrCode</h4>";
	echo "<input style='width:20%' class='form-control'type='text' name='sessaoQrCode' id='sessaoQrCode' placeholder='Insira a Sessão'>";
	echo "<br>";
	echo "<input style='width:20%' class='form-control'type='text' name='tokenQrCode' id='tokenQrCode' placeholder='Insira o Token'>";
	echo "<br>";
	echo "<input class='btn btn-success' type='submit' name='button3' class='button' value='Captura QrCode' />";
	echo "<br>";
	echo "<hr>";
	echo "</div>";
	echo "</div>";
	
	
	echo "</form>";
	echo "<hr>";
	echo "<p>Desenvolvido por Comunidade ZDG</p>";
  

  

  ?>

</body>
</html>