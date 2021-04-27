<?php
	session_start();
	include_once('conexao5.php');

	setlocale( LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese' );
	date_default_timezone_set('America/Sao_Paulo');

	$uppercaseMonth = ucfirst(gmstrftime('%B'));

	$codImovel = isset($_GET['codImovel']) ? $_GET['codImovel'] : "";
	$nrDic = isset($_GET['nrDic']) ? $_GET['nrDic'] : "";
	$endCompleto = isset($_GET['endCompleto']) ? $_GET['endCompleto'] : "";

	$inscImobiliaria = isset($_GET['inscImobiliaria']) ? $_GET['inscImobiliaria'] : "";

	$nrAtendimento = isset($_GET['nrAtendimento']) ? $_GET['nrAtendimento'] : "";

	$periodo = isset($_GET['periodo']) ? $_GET['periodo'] : "";

	$nomeArquivo = "Negativa de Débito 05-$nrAtendimento";

	$nrAtendimento = isset($_GET['nrAtendimento']) ? $_GET['nrAtendimento'] : "";

	header('Content-Type: text/html; charset=utf-8'); //Aqui!


	header("Content-Type: application/vnd.msword");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	//header("content-disposition: attachment;filename=Negativa de Débito N.doc");
	header("Content-Disposition: attachment; filename=$nomeArquivo.doc");
	echo '
	<html>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


	<p><img src="https://i.postimg.cc/3R2yyVFd/logo.jpg" alt="logo" width="167" height="140" /></p>
	<p style="text-align: center; font-size: 16pt; font-family: arial;"><strong>DECLARA&Ccedil;&Atilde;O N&ordm '; print "05-$nrAtendimento"; print '</strong></p>
	<p style="text-align: center;">&nbsp;</p>
	<p style="text-align: justify; font-size: 14pt; font-family: arial;">Declaramos para os devidos fins, que o imóvel localizado na <strong>'; print "$endCompleto"; print '</strong>, nesta cidade, cadastrado atualmente em nosso banco de dados sob código do imóvel nº <strong>';echo "$codImovel"; echo '</strong> e inscrição imobiliária nº <strong>';echo "$inscImobiliaria"; echo '</strong>, encontra-se com a tarifa de coleta de lixo, referente ao período de <strong>'; print "$periodo"; print '</strong>, devidamente quitado junto a declarante.<br> 
    No mais, a presente declaração não atesta a quitação de débitos anteriores ou posteriores ao período informado acima. <br> 
    Importante ressaltar, que a cobrança da tarifa de coleta de lixo, para os imóveis situados no município de Itapema, teve início a partir de Janeiro de 2010. <br> 
    </p>
	<p style="text-align: justify; font-size: 14pt; font-family: arial;">&nbsp;</p>
	<p style="font-size: 14pt; font-family: arial; text-align: center;">Itapema, ';echo utf8_encode(strftime( '%d de ' .$uppercaseMonth. ' de %Y', strtotime('today')));echo '.</p>
	<p style="font-size: 14pt; font-family: arial; text-align: center;">&nbsp;</p>
	<p style="font-size: 14pt; font-family: arial; text-align: center;"><img src="https://i.postimg.cc/HW2xfQZD/assinatura.jpg" alt="" width="188" height="119" /></p>
	<p style="font-size: 14pt; font-family: arial; text-align: center;"><strong>___________________________________________________</strong><br /><strong>AMBIENTAL LIMPEZA URBANA E SANEAMENTO LTDA.</strong></p>
	<p style="font-size: 14pt; font-family: arial; text-align: center;">&nbsp;</p>
	<p style="font-size: 8pt; font-family: arial; text-align: center;">Ambiental Limpeza Urbana e Saneamento Ltda<br />Fone: (047) 3441-0400 &ndash; Atendimento das 8h &agrave;s 18h de 2&ordf; a 6&ordf; feira<br />Rua Lages, 323, Centro &ndash; Joinville &ndash; SC&nbsp;&ndash; CEP 89.201-205 &ndash; E-mail: atendimento@ambiental.sc</p>
	
	
	
	
	</html>';
?> 

<!--
	Apagar imagem da logo: https://postimg.cc/delete/8qmFhNN4/d0804491
	Apagar imagem da assinatura: https://postimg.cc/delete/04tjxtQz/897a6cad	
-->