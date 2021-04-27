<?php
	session_start();
	include_once('conexao3.php');

	setlocale( LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese' );
	date_default_timezone_set('America/Sao_Paulo');

	$uppercaseMonth = ucfirst(gmstrftime('%B'));

	$codImovel = isset($_GET['codImovel']) ? $_GET['codImovel'] : "";
	$inscImobiliaria = isset($_GET['inscImobiliaria']) ? $_GET['inscImobiliaria'] : "";
	$endCompleto = isset($_GET['endCompleto']) ? $_GET['endCompleto'] : "";

	$nrAtendimento = isset($_GET['nrAtendimento']) ? $_GET['nrAtendimento'] : "";

	$periodo = isset($_GET['periodo']) ? $_GET['periodo'] : "";

	$nomeArquivo = "Negativa de Débito 03-$nrAtendimento";

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
	<p style="text-align: center; font-size: 16pt; font-family: arial;"><strong>DECLARA&Ccedil;&Atilde;O N&ordm '; print "03-$nrAtendimento"; print '</strong></p>
	<p style="text-align: center;">&nbsp;</p>
	<p style="text-align: justify; font-size: 14pt; font-family: arial;">Declaramos para os devidos fins, que o im&oacute;vel localizado na rua <strong>'; print "$endCompleto"; print '</strong>, nesta cidade, cadastrado atualmente em nosso banco de dados sob c&oacute;digo do im&oacute;vel n&ordm; <strong>';echo "$codImovel"; echo '</strong> e inscri&ccedil;&atilde;o imobili&aacute;ria <strong>';echo "$inscImobiliaria";echo '</strong>, encontra-se com a tarifa de coleta de lixo, referente ao per&iacute;odo de <strong>';echo "$periodo";echo '</strong>, devidamente quitado junto a declarante.<br /> No mais, a presente declara&ccedil;&atilde;o n&atilde;o atesta a quita&ccedil;&atilde;o de d&eacute;bitos anteriores ou posteriores ao per&iacute;odo informado acima.<br /> Importante ressaltar, que a cobran&ccedil;a da tarifa de coleta de lixo, para os im&oacute;veis situados no munic&iacute;pio de Joinville, teve in&iacute;cio a partir de Janeiro de 2004.</p>
	<p style="text-align: justify; font-size: 14pt; font-family: arial;">&nbsp;</p>
	<p style="font-size: 14pt; font-family: arial; text-align: center;">Joinville, ';echo utf8_encode(strftime( '%d de ' .$uppercaseMonth. ' de %Y', strtotime('today')));echo '.</p>
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