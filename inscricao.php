<?php 
include ('head.php');
include ('components/main.php');
if (@$_POST['nome']){
extract($_POST);
$nasc = dataen($nasc);
$curriculo = gera_imagem('arquivo', '/admin/files/curriculos/');
$inscricao = array('IN_NOME' =>$nome, 'IN_RG' =>$rg, 'IN_CPF' =>$cpf, 'IN_MATRICULA' =>$matricula, 'IN_NASCIMENTO' =>$nasc, 'IN_SEXO' =>$sexo, 'IN_TELEFONE1' => $tel1, 'IN_TELEFONE2' => $tel2, 'IN_EMAIL' =>$email, 'IN_PORTADOR' =>$especial,'IN_NECESSIDADES' =>$tipoesp , 'IN_COMENTARIO' =>$message, 'IN_DATA' =>$data, 'IN_STATUS' =>1, 'IN_CELULA' =>$area, 'IN_CURRICULO' =>$curriculo);
$query -> Insert($inscricao, 'tb_inscricoes');
//header('Location: inscricao.php?msg=15');
}
include ('components/notifica.php');
?>
			<div id="conteudo">
				<div id="inscricao">
                <p style="font-family:'nexa light';font-size:24px;">Formulário de inscrição do ProSEmpre 2013.2</p><br /><br />
                <form method="post" action="inscricao.php" enctype="multipart/form-data">
        			<div class="left">Nome: </div><input type="text" class="form-ps left" name="nome" id="nome" required/><br />
        			<div class="left">RG: </div><input type="text" class="form-ps left" name="rg" id="rg" required/><br />
        			<div class="left">CPF: </div><input type="text" class="form-ps left" name="cpf" id="cpf" /><br />
        			<div class="left">Matrícula: </div><input type="text" class="form-ps left" name="matricula" id="matricula" required/><br />
        			<div class="left">Data de Nascimento: </div><input type="date" class="form-ps left" name="nasc" id="nasc" /><br />
        			<div class="left">Sexo: </div><select class="form-ps left" name="sexo">
                                    <option value="1">Masculino</option>
                                    <option value="0">Feminino</option>
              		</select><br />
              		<div class="left">Telefones: </div>
                	<input type="text" class="form-ps left" name="tel1" id="tel1" required/>
                	<input type="text" class="form-ps left" name="tel2" id="tel2" /><br />
        			<div class="left">E-mail: </div><input type="text" class="form-ps left" name="email" id="email" required/>
                	<div class="left">É portador de necessidades especiais? </div>
        			<select class="form-ps left" name="especial">
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
              		</select><br />
              		Se sim, qual(is)? <input type="text" class="form-ps left" name="tipoesp" id="tipoesp" />
                	<p style="font-family:'nexa light'">Célula para a qual deseja entrar:</p><br />
                	<input type="radio" name="area left" value="adm-fin" /> Administrativo-Financeiro<br />
                    <input type="radio" name="area" value="Comercial"/> Comercial <br />
                    <input type="radio" name="area" value="Inovação"/> Inovação <br />
                    <input type="radio" name="area" value="Publicidade"/> Publicidade <br />
                    <input type="radio" name="area" value="Programação"/> Programação <br />
                    <input type="radio" name="area" value="Qualidades"/> Qualidades <br />
        			<textarea name="message" class="msg-contato" id="coments" placeholder="Dúvidas/Sugestões/Comentários"></textarea>
    			<li style="font-family:'nexa light'">
        			Nos envie o seu currículo:
                    <input type="file" name="arquivo"/>
       				<input type="submit" class="imput-contato" id="send_message" value="Enviar" />
    			</li>
			</form>
		</div>
		</div>
		</div>
		</div>

		<div style="clear:both;"></div>
<?php include ("footer.php");?>
		</div>
	</body>
</html>