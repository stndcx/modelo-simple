<?php

function headerapp(){
	$html_header = "html/header.php";
	require_once($html_header);
}

function footerapp($data=""){
	$html_footer = "html/footer.php";
	require_once($html_footer);
}

function dep($data){
	$format  = print_r('<pre>');
	$format .= print_r($data);
	$format .= print_r('</pre>');
	return $format;
}

function format_money($money){
	$money = number_format($money,2,SPM,SPD);
	return $money;
}

?>