<?php

$arrPacotes = array(
					array(	'Pilhas',
							'RG955391835BE',
							100,
							'',
							'',
							'',
							''),
					array(	'4 Pilhas 16340',
							'RG955342865BE',
							100,
							'',
							'',
							'',
							''),
					array(	'Case 4 Pilhas',
							'RX709230610CN',
							100,
							'',
							'',
							'',
							''),
					array(	'Audio Silver Cable P2 P2',
							'RH962844655CN',
							120,
							'',
							'',
							'',
							''),
					array(	'4ft Silver Cable P2 P2',
							'RH962846149CN',
							120,
							'',
							'',
							'',
							''),
					array(	'Powerbank Blitzwolf',
							'RG955208101BE',
							100,
							'',
							'',
							'',
							''),
					array(	'Lacrosse Weather Station',
							'UA924387924US',
							100,
							'',
							'',
							'',
							''),
					array(	'HW0045',
							'RX195111069CH',
							100,
							'',
							'',
							'',
							''),
					array(	'Chave de Fenda TRIWING',
							'PP772425145BR',
							100,
							'',
							'',
							'',
							''),
					array(	'HB Purple',
							'LJ205358395US',
							300,
							'',
							'',
							'',
							'')

					);

/*
					array(	'Sony MDR-1000X Preto',
							'CF335133031US',
							100,
							'',
							'',
							'',
							''),
					array(	'Lanternas 1',
							'LS998131991CH',
							100,
							'',
							'',
							'',
							''),
					array(	'Lanternas 2',
							'LS998178852CH',
							100,
							'',
							'',
							'',
							''),
					array(	'Capinhas P2',
							'RG781907260CN',
							100,
							'',
							'',
							'',
							''),












var pages = new Array();
pages.push (new Array('Xtreamer Silver 12/08/2014',
		     'SA751828696BR',
		     100,
		     '',
		     '',
		     '',
		     ''));
*/					

// print_r($arrPacotes);

echo "<script>\n";
echo "var pages = new Array();\n";

foreach ($arrPacotes as $pacote) {
	echo "pages.push (new Array('" . $pacote[0] . "',\n";
	echo "						'" . $pacote[1] . "',\n";
	echo "						'" . $pacote[2] . "',\n";
	echo "						'" . $pacote[3] . "',\n";
	echo "						'" . $pacote[4] . "',\n";
	echo "						'" . $pacote[5] . "'));\n";
}

// echo "</script>\n";

?>
