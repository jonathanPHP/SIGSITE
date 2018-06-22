<?php 
include ('head.php');
include ('components/main.php');
if (@$_POST['message']){
extract($_POST);
$contato = array('CON_NOME' =>$name, 'CON_EMAIL' =>$email, 'CON_ASSUNTO' =>$subject, 'CON_MENSAGEM' =>$message, 'CON_DATA' =>$data, 'CON_STATUS' =>1);
$query -> Insert($contato, 'tb_contatos');
header('Location: contato.php?msg=1');
}
include ('components/notifica.php');
?>
			<div id="conteudo">
				<div class="titulo">Contato</div>
				<div style="clear:both"></div>
				<div class="contato">
				
			<form action='contato.php' method='post'>
			<ul>                      
    			<li>
        			<input type="text" class="form-contato" name="name" id="name" placeholder="Nome:"/>
    			</li>
    			<li>
        			<input type="text" class="form-contato" name="email" id="email" placeholder="E-mail:"/>
    			</li>
    			<li>
        			<input type="text" class="form-contato" name="subject" id="subject" placeholder="Assunto:"/>
    			</li>
    			<li>
        			<textarea name="message" class="msg-contato" id="message"></textarea>
    			</li>
    			<li>
       				<input type="submit" class="imput-contato" id="send_message" value="Enviar" />
    			</li>
			</ul>
			</form>
		</div></div>
			
		</div>

		<div style="clear:both;"></div>
<?php include ('footer.php');?>
		</div>
	</body>
</html>