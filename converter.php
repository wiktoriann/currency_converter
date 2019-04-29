<!doctype html>
	<html>
		<head>
			<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Allerta+Stencil|Audiowide|Cinzel|Didact+Gothic|Iceberg|Julius+Sans+One|Playfair+Display+SC|Righteous" rel="stylesheet"> 
			<meta charset="utf-8"/>
			<title>Cashier</title>
			<link rel="stylesheet" type="text/css" href="style.css"/>
		</head>
		<body>
		<div id="header">
				<i>Cashier</i>
			</div>
			<div id="form">
			<div id="posthead">
				<i>RESULT</i>
			</div>
			<?php
			$amount=$_POST['amount'];
            $amount=str_replace(',','.',$amount); 
			echo 'Your amount: '.$amount.'</br></br>';
			settype($amount, 'float');
			
			if(empty($amount))
			{
				echo 'You have to insert amount!';
			}
			else
				
		
			
			$nbp = file_get_contents('http://api.nbp.pl/api/exchangerates/rates/a/usd?format=json');
			$dane = json_decode($nbp,TRUE);
			$kurs = $dane['rates'][0]['mid']; 
			echo 'Currency rate: '.round($kurs,2).'</br></br>'; 
			settype($amount, 'float');
			
			switch($_POST['value']) 
			{
				case 'dodolara':
				
				$usd= $amount / $kurs;
				settype($usd,'float');
				
				echo 'Converted: '.round($usd,2).' USD</br></br>';
				
				break;
				
				case 'dozlotego':
				
				$pln= $amount * $kurs;
				settype($pln,'float');
				
                echo 'Converted: '.round($pln,2).' PLN</br></br>';
				
				break;
			}
			?>
                <a href="index.html"><button name="back">Back</button></a>
                
			</div>
		</body>
	</html>