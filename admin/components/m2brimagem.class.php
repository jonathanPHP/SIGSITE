<?php
/**
 * m2brimagem.class.php
 *
 * Classe para manipulaÃ§Ã£o de imagens
 *
 * @package    m2brnet admin v2 [www.m2brnet.com]
 * @author     Davi Ferreira <contato@daviferreira.com>
 * @version    0.8 $ 2010-02-26 20:22:13 $
*/

class m2brimagem {

	// arquivos
	private $origem, $img, $img_temp;	
	// dimensÃµes
	private $largura, $altura, $nova_largura, $nova_altura, $tamanho_html;
	// dados do arquivo
	private $formato, $extensao, $tamanho, $arquivo, $diretorio;
	// extensÃµes vÃ¡lidas
	private $extensoes_validas;
	// cor de fundo para preenchimento
	private $rgb;
	// posicionamento do crop
	private $posicao_crop;
	// mensagem de erro
	private $erro;
	
	/**
	 * Construtor
	 * @param $string caminho da imagem a ser carregada
	 * @return void
	*/
	public function m2brimagem( $origem = '', $extensoes_validas = array( 'jpg', 'jpeg', 'jpe', 'gif', 'bmp', 'png' ) ) 
	{
		
		$this->origem					= $origem;
		$this->extensoes_validas		= $extensoes_validas;
		
		if ( $this->origem ) 
		{
			$this->dados();
		}
		
		$this->rgb( 0, 0, 0 );
		
	} // fim construtor
	
	/**
	 * Retorna dados da imagem
	 * @param
	 * @return void
	*/	
	private function dados() 
	{
		
		// mensagem padrÃ£o, sem erro
		$this->erro = 'OK';
		
		// verifica se imagem existe
		if ( !is_file( $this->origem ) ) 
		{
	   		$this->erro = 'Erro: Arquivo de imagem nÃ£o encontrado!';
		} 
		else 
		{
			// dados do arquivo
			$this->dadosArquivo();
			
			// verifica se Ã© imagem
			if (!$this->eImagem()) 
			{
				$this->erro = 'Erro: Arquivo '.$this->origem.' nÃ£o Ã© uma imagem!';
			} 
			else 
			{
				// pega dimensÃµes
				$this->dimensoes();
				
				// cria imagem para php
				$this->criaImagem();			
			}
		}
		
	} // fim dadosImagem
	
	/**
	 * Retorna validaÃ§Ã£o da imagem
	 * @param
	 * @return String string com erro de mensagem ou 'OK' para imagem vÃ¡lida
	*/	
	public function valida() 
	{
		return $this->erro;
	} // fim valida
	
	/**
	 * Carrega uma nova imagem, fora do construtor
	 * @param String caminho da imagem a ser carregada
	 * @return void
	*/	
	public function carrega( $origem = '' ) 
	{
		$this->origem			= $origem;
		$this->dados();
	} // fim carrega

//------------------------------------------------------------------------------
// dados da imagem

	/**
	 * Busca dimensÃµes e formato real da imagem
	 * @param
	 * @return void
	*/	
	private function dimensoes() 
	{
		$dimensoes 				= getimagesize( $this->origem );
		$this->largura 	 		= $dimensoes[0];
		$this->altura	 		= $dimensoes[1];
		// 1 = gif, 2 = jpeg, 3 = png, 6 = BMP
		// http://br2.php.net/manual/en/function.exif-imagetype.php
		$this->formato			= $dimensoes[2];
		$this->tamanho_html		= $dimensoes[3];
	} // fim dimensoes
	
	/**
	 * Busca dados do arquivo
	 * @param
	 * @return void
	*/	
	private function dadosArquivo() 
	{
		// imagem de origem
		$pathinfo 			= pathinfo( $this->origem );
		$this->extensao 	= strtolower( $pathinfo['extension'] );
		$this->arquivo		= $pathinfo['basename'];
		$this->diretorio	= $pathinfo['dirname'];
		$this->tamanho		= filesize( $this->origem );
	} // fim dadosArquivo
	
	/**
	 * Verifica se o arquivo indicado Ã© uma imagem
	 * @param
	 * @return Boolean true/false
	*/	
	private function eImagem() 
	{
		// filtra extensÃ£o
		if ( !in_array( $this->extensao, $this->extensoes_validas ) )
		{
			return false;
		}
		else
		{
			return true;
		}
	} // fim validaImagem	
	
//------------------------------------------------------------------------------
// manipulaÃ§Ã£o da imagem	

	/**
	 * Cria objeto de imagem para manipulaÃ§Ã£o no GD
	 * @param
	 * @return void
	*/	
	private function criaImagem() 
	{
		switch ( $this->formato )
		{
			case 1: 
				$this->img = imagecreatefromgif( $this->origem ); 
				$this->extensao = 'gif'; 
				break;
			case 2: 
				$this->img = imagecreatefromjpeg( $this->origem ); 
				$this->extensao = 'jpg';  
				break;
			case 3: 
				$this->img = imagecreatefrompng( $this->origem ); 
				$this->extensao = 'png'; 
				break;
			case 6: 
				$this->img = imagecreatefrombmp( $this->origem ); 
				$this->extensao = 'bmp'; 
				break;
			default:  
				trigger_error( 'Arquivo invÃ¡lido!', E_USER_WARNING );
				break;
		}
	} // fim criaImagem

//------------------------------------------------------------------------------
// funÃ§Ãµes para redimensionamento
	
	/**
	 * Armazena os valores RGB para redimensionamento com fill
	 * @param Valores R, G e B
	 * @return Void
	*/
	public function rgb( $r, $g, $b )
	{
		$this->rgb = array( $r, $g, $b );
	} // fim rgb
	
	/**
	 * Armazena posiÃ§Ãµes x e y para crop
	 * @param Array valores x e y
	 * @return Void
	*/
	public function posicaoCrop( $x, $y )
	{
		$this->posicao_crop = array( $x, $y, $this->largura, $this->altura );
	} // fim posicao_crop
	
	/**
	 * Redimensiona imagem
	 * @param Int $nova_largura valor em pixels da nova largura da imagem
	 * @param Int $nova_altura valor em pixels da nova altura da imagem	 
	 * @param String $tipo mÃ©todo para redimensionamento (padrÃ£o [vazio], 'fill' [preenchimento] ou 'crop')
	 * @return Boolean/void
	*/	
	public function redimensiona( $nova_largura = 0, $nova_altura = 0, $tipo = '' ) 
	{
	
		// seta variÃ¡veis passadas via parÃ¢metro
		$this->nova_largura		= $nova_largura;
		$this->nova_altura		= $nova_altura;
		
		// verifica se passou altura ou largura como porcentagem
		// largura %
		$pos = strpos( $this->nova_largura, '%' );
		if( $pos !== false && $pos > 0 )
		{
			$porcentagem			= ( ( int ) str_replace( '%', '', $this->nova_largura ) ) / 100;
			$this->nova_largura		= round( $this->largura * $porcentagem );
		}
		// altura %
		$pos = strpos( $this->nova_altura, '%' );
		if( $pos !== false && $pos > 0 )
		{
			$porcentagem			= ( ( int ) str_replace( '%', '', $this->nova_altura ) ) / 100;
			$this->nova_altura		= $this->altura * $porcentagem;
		}
		
		// define se sÃ³ passou nova largura ou altura
		if ( !$this->nova_largura && !$this->nova_altura ) 
		{
			return false;
		} 
		// sÃ³ passou altura
		elseif ( !$this->nova_largura ) 
		{
			$this->nova_largura = $this->largura / ( $this->altura/$this->nova_altura );
		}
		// sÃ³ passou largura		
		elseif ( !$this->nova_altura ) 
		{
			$this->nova_altura = $this->altura / ( $this->largura/$this->nova_largura );
		}
		
		// redimensiona de acordo com tipo
		switch( $tipo )
		{
			case 'crop':
				$this->resizeCrop();
				break;
			case 'fill':
				$this->resizeFill();
				break;
			case 'fill2':
				$this->resize();
				break;
			default:
				$this->resize();
				break;
		}

		// atualiza dimensÃµes da imagem
		$this->altura 	= $this->nova_altura;
		$this->largura	= $this->nova_largura;
	
	} // fim redimensiona
	
	/**
	 * Redimensiona imagem, modo padrÃ£o, sem crop ou fill (distorcendo)
	 * @param
	 * @return void
	*/	
	private function resize() 
	{	
		// cria imagem de destino temporÃ¡ria
		$this->img_temp	= imagecreatetruecolor( $this->nova_largura, $this->nova_altura );
		
		imagecopyresampled( $this->img_temp, $this->img, 0, 0, 0, 0, $this->nova_largura, $this->nova_altura, $this->largura, $this->altura );
		$this->img	= $this->img_temp;
	} // fim resize()
	
	/**
	 * Adiciona cor de fundo Ã  imagem
	 * @param
	 * @return void
	*/
	private function preencheImagem()
	{
		$corfundo = imagecolorallocate( $this->img_temp, $this->rgb[0], $this->rgb[1], $this->rgb[2] );
		imagefill( $this->img_temp, 0, 0, $corfundo );
	} // fim preencheImagem
	
	/**
	 * Redimensiona imagem sem cropar, proporcionalmente, 
	 * preenchendo espaÃ§o vazio com cor rgb especificada
	 * @param
	 * @return void
	*/	
	private function resizeFill() 
	{
		// cria imagem de destino temporÃ¡ria
		$this->img_temp	= imagecreatetruecolor( $this->nova_largura, $this->nova_altura );
		
		// adiciona cor de fundo Ã  nova imagem
		$this->preencheImagem();
		
		// salva variÃ¡veis para centralizaÃ§Ã£o
		$dif_y = $this->nova_altura;
		$dif_x = $this->nova_largura;
		
		// verifica altura e largura
		if ( $this->largura > $this->altura ) 
		{
			$this->nova_altura	= ( ( $this->altura * $this->nova_largura ) / $this->largura );
		} 
		elseif ( $this->largura <= $this->altura ) 
		{
			$this->nova_largura	= ( ( $this->largura * $this->nova_altura ) / $this->altura );
		}  // fim do if verifica altura largura
		
		// copia com o novo tamanho, centralizando
		$dif_x = ( $dif_x - $this->nova_largura ) / 2;
		$dif_y = ( $dif_y - $this->nova_altura ) / 2;
		imagecopyresampled( $this->img_temp, $this->img, $dif_x, $dif_y, 0, 0, $this->nova_largura, $this->nova_altura, $this->largura, $this->altura );
		$this->img	= $this->img_temp;
	} // fim resizeFill()
	
	/**
	 * Calcula a posiÃ§Ã£o do crop
	 * Os Ã­ndices 0 e 1 correspondem Ã  posiÃ§Ã£o x e y do crop na imagem
	 * Os Ã­ndices 2 e 3 correspondem ao tamanho do crop
	 * @param
	 * @return void
	*/
	private function calculaPosicaoCrop()
	{
		// mÃ©dia altura/largura
		$hm	= $this->altura / $this->nova_altura;
		$wm	= $this->largura / $this->nova_largura;
		
		// 50% para cÃ¡lculo do crop
		$h_height = $this->nova_altura / 2;
		$h_width  = $this->nova_largura / 2;
		
		// calcula novas largura e altura
		if( !is_array( $this->posicao_crop ) )
		{
			if ( $wm > $hm ) 
			{
				$this->posicao_crop[2] 	= $this->largura / $hm;
				$this->posicao_crop[3]  = $this->nova_altura;
				$this->posicao_crop[0]  = ( $this->posicao_crop[2] / 2 ) - $h_width;
				$this->posicao_crop[1]	= 0;
			} 
			// largura <= altura
			elseif ( ( $wm <= $hm ) ) 
			{
				$this->posicao_crop[2] 	= $this->nova_largura;
				$this->posicao_crop[3]  = $this->altura / $wm;
				$this->posicao_crop[0]  = 0;
				$this->posicao_crop[1]	= ( $this->posicao_crop[3] / 2 ) - $h_height;
			}
		}
	} // fim calculaPosicaoCrop
	
	/**
	 * Redimensiona imagem, cropando para encaixar no novo tamanho, sem sobras
	 * baseado no script original de Noah Winecoff
	 * http://www.findmotive.com/2006/12/13/php-crop-image/
	 * atualizado para receber o posicionamento X e Y do crop na imagem
	 * @return void
	*/	
	private function resizeCrop() 
	{
		// calcula posicionamento do crop
		$this->calculaPosicaoCrop();
		
		// cria imagem de destino temporÃ¡ria
		$this->img_temp	= imagecreatetruecolor( $this->nova_largura, $this->nova_altura );
		
		// adiciona cor de fundo Ã  nova imagem
		$this->preencheImagem();
	
		imagecopyresampled( $this->img_temp, $this->img, -$this->posicao_crop[0], -$this->posicao_crop[1], 0, 0, $this->posicao_crop[2], $this->posicao_crop[3], $this->largura, $this->altura );
		
		$this->img	= $this->img_temp;
	} // fim resizeCrop

//------------------------------------------------------------------------------
// funÃ§Ãµes de manipulaÃ§Ã£o da imagem

	/**
	 * flipa/inverte imagem
	 * baseado no script original de Noah Winecoff
	 * http://www.php.net/manual/en/ref.image.php#62029
	 * @param String $tipo tipo de espelhamento: h - horizontal, v - vertical
	 * @return void
	*/	
	public function flip( $tipo = 'h' ) 
	{
		$w = imagesx( $this->img );
		$h = imagesy( $this->img );
		
		$this->img_temp = imagecreatetruecolor( $w, $h );
		
		// vertical
		if ( 'v' == $tipo ) 
		{
			for ( $y = 0; $y < $h; $y++ ) 
			{
				imagecopy( $this->img_temp, $this->img, 0, $y, 0, $h - $y - 1, $w, 1 );
			}
		}
		
		// horizontal
		if ( 'h' == $tipo ) 
		{
			for ( $x = 0; $x < $w; $x++ ) 
			{
				imagecopy( $this->img_temp, $this->img, $x, 0, $w - $x - 1, 0, 1, $h );
			}
		}
		
		$this->img	= $this->img_temp;
		
	} // fim flip

	/**
	 * gira imagem
	 * @param Int $graus grau para giro
	 * @param Array $rgb cor RGB para preenchimento
	 * @return void
	*/	
	public function girar( $graus, $rgb = array( 255,255,255 ) ) 
	{
		$corfundo	= imagecolorallocate( $this->img, $rgb[0], $rgb[1], $rgb[2] );
		$this->img	= imagerotate( $this->img, $graus, $corfundo );
	} // fim girar
	
	/**
	 * adiciona texto Ã  imagem
	 * @param String $texto texto a ser inserido
	 * @param Int $tamanho tamanho da fonte
	 * @param Int $x posiÃ§Ã£o x do texto na imagem
	 * @param Int $y posiÃ§Ã£o y do texto na imagem
	 * @param Array $rgb cor do texto
	 * @param Boolean $truetype true para utilizar fonte truetype, false para fonte do sistema
	 * @param String $fonte nome da fonte truetype a ser utilizada
	 * @return void
	*/	
	public function legenda( $texto, $tamanho = 10, $x = 0, $y = 0, $rgb = array( 255,255,255 ), $truetype = false, $fonte = '' ) 
	{     
		$cortexto = imagecolorallocate( $this->img, $rgb[0], $rgb[1], $rgb[2] );
		
		// truetype ou fonte do sistema?
		if ( $truetype === true ) 
		{
			imagettftext( $this->img, $tamanho, 0, $x, $y, $cortexto, $fonte, $texto );
		} 
		else 
		{
			imagestring( $this->img, $tamanho, $x, $y, $texto, $cortexto );
		}
	} // fim legenda

	/**
	 * adiciona imagem de marca d'Ã¡gua
	 * @param String $imagem caminho da imagem de marca d'Ã¡gua
	 * @param Int $x posiÃ§Ã£o x da marca na imagem
	 * @param Int $y posiÃ§Ã£o y da marca na imagem
	 * @return Boolean true/false dependendo do resultado da operaÃ§Ã£o 
	 * @param Int $alfa valor para transparÃªncia (0-100)
	 			  -> se utilizar alfa, a funÃ§Ã£o imagecopymerge nÃ£o preserva
				  -> o alfa nativo do PNG
	 */	
	public function marca( $imagem, $x = 0, $y = 0, $alfa = 100 ) 
	{
		// cria imagem temporÃ¡ria para merge
		if ( $imagem ) {
			$pathinfo = pathinfo( $imagem );
			switch( strtolower( $pathinfo['extension'] ) ) 
			{
				case 'jpg':
				case 'jpeg':
					$marcadagua = imagecreatefromjpeg( $imagem );
					break;
				case 'png':
					$marcadagua = imagecreatefrompng( $imagem );
					break;
				case 'gif':
					$marcadagua = imagecreatefromgif( $imagem );
					break;
				case 'bmp':
					$marcadagua = imagecreatefrombmp( $imagem );
					break;
				default:
					$this->erro = 'Arquivo de marca d\'Ã¡gua invÃ¡lido.';
					return false;
			}	
		} 
		else 
		{
			return false;
		}
		// dimensÃµes
		$marca_w	= imagesx( $marcadagua );
		$marca_h	= imagesy( $marcadagua );
		// retorna imagens com marca d'Ã¡gua
		if ( is_numeric( $alfa ) && ( ( $alfa > 0 ) && ( $alfa < 100 ) ) ) {
			imagecopymerge( $this->img, $marcadagua, $x, $y, 0, 0, $marca_w, $marca_h, $alfa );
		} else {
			imagecopy( $this->img, $marcadagua, $x, $y, 0, 0, $marca_w, $marca_h );
		}
		return true;
	} // fim marca

	/**
	 * adiciona imagem de marca d'Ã¡gua, com valores fixos
	 * ex: topo_esquerda, topo_direita etc.
	 * ImplementaÃ§Ã£o original por Giolvani <inavloig@gmail.com>
	 * @param String $imagem caminho da imagem de marca d'Ã¡gua
	 * @param String $posicao posiÃ§Ã£o/orientaÃ§Ã£o fixa da marca d'Ã¡gua
	 *        [topo, meio, baixo] + [esquerda, centro, direita]
	 * @param Int $alfa valor para transparÃªncia (0-100)
	 * @return void
	*/	
	public function marcaFixa( $imagem, $posicao, $alfa = 100 ) 
	{

		// dimensÃµes da marca d'Ã¡gua
		list( $marca_w, $marca_h ) = getimagesize( $imagem );

		// define X e Y para posicionamento
		switch( $posicao )
		{
			case 'topo_esquerda':
				$x = 0;
				$y = 0;
				break;
			case 'topo_centro':
				$x = ( $this->largura - $marca_w ) / 2;
				$y = 0;
				break;
			case 'topo_direita':
				$x = $this->largura - $marca_w;
				$y = 0;
				break;
			case 'meio_esquerda':
				$x = 0;
				$y = ( $this->altura / 2 ) - ( $marca_h / 2 );  
				break;
			case 'meio_centro':
				$x = ( $this->largura - $marca_w ) / 2;
				$y = ( $this->altura / 2 ) - ( $marca_h / 2 );
				break;
			case 'meio_direita':
				$x = $this->largura - $marca_w;
				$y = ( $this->altura / 2) - ( $marca_h / 2 );
				break;
			case 'baixo_esquerda':
				$x = 0;
				$y = $this->altura - $marca_h;
				break;
			case 'baixo_centro':
				$x = ( $this->largura - $marca_w ) / 2;
				$y = $this->altura - $marca_h;
				break;
			case 'baixo_direita':
				$x = $this->largura - $marca_w;
				$y = $this->altura - $marca_h;
				break;
			default:
				return false;
				break;
		} // end switch posicao

		// cria marca
		$this->marca( $imagem, $x, $y, $alfa );

	} // fim marcaFixa


//------------------------------------------------------------------------------
// gera imagem de saÃ­da

	/**
	 * retorna saÃ­da para tela ou arquivo
	 * @param String $destino caminho e nome do arquivo a serem criados
	 * @param Int $qualidade qualidade da imagem no caso de JPEG (0-100)
	 * @return void
	*/	
	public function grava( $destino='', $qualidade = 100 ) 
	{
		// dados do arquivo de destino	
		if ( $destino ) 
		{	
			$pathinfo 			= pathinfo( $destino );
			$dir_destino		= $pathinfo['dirname'];
			$extensao_destino 	= strtolower( $pathinfo['extension'] );
			
			// valida diretÃ³rio
			if ( !is_dir( $dir_destino ) ) 
			{
				$this->erro	= 'DiretÃ³rio de destino invÃ¡lido ou inexistente';
				return false;
			}
			
		}
		
		// valida extensÃ£o de destino
		if ( !isset( $extensao_destino ) ) 
		{
			$extensao_destino = $this->extensao;
		} 
		else 
		{
			if ( !in_array( $extensao_destino, $this->extensoes_validas ) )
			{
				$this->erro = 'ExtensÃ£o invÃ¡lida para o arquivo de destino';
				return false;
			}
		}
		
		switch( $extensao_destino )
		{
			case 'jpg':
			case 'jpeg':
			case 'bmp':
				if ( $destino ) 
				{
					imagejpeg( $this->img, $destino, $qualidade );
				} 
				else 
				{
					header( "Content-type: image/jpeg" );
					imagejpeg( $this->img, NULL, $qualidade );
					imagedestroy( $this->img );
					exit;
				}
				break;
			case 'png':
				if ( $destino ) 
				{
					imagepng( $this->img, $destino );
				} 
				else 
				{
					header( "Content-type: image/png" );
					imagepng( $this->img );
					imagedestroy( $this->img );
					exit;
				}
				break;
			case 'gif':
				if ( $destino ) 
				{
					imagegif( $this->img, $destino );
				} 
				else 
				{
					header( "Content-type: image/gif" );
					imagegif( $this->img );
					imagedestroy( $this->img );
					exit;
				}
				break;
			default:
				return false;
				break;
		}
		
	} // fim grava

//------------------------------------------------------------------------------
// fim da classe    
}

//------------------------------------------------------------------------------
// suporte para a manipulaÃ§Ã£o de arquivos BMP

/*********************************************/
/* Function: ImageCreateFromBMP              */
/* Author:   DHKold                          */
/* Contact:  admin@dhkold.com                */
/* Date:     The 15th of June 2005           */
/* Version:  2.0B                            */
/*********************************************/

function imagecreatefrombmp($filename) {
 //Ouverture du fichier en mode binaire
   if (! $f1 = fopen($filename,"rb")) return FALSE;

 //1 : Chargement des ent?tes FICHIER
   $FILE = unpack("vfile_type/Vfile_size/Vreserved/Vbitmap_offset", fread($f1,14));
   if ($FILE['file_type'] != 19778) return FALSE;

 //2 : Chargement des ent?tes BMP
   $BMP = unpack('Vheader_size/Vwidth/Vheight/vplanes/vbits_per_pixel'.
				 '/Vcompression/Vsize_bitmap/Vhoriz_resolution'.
				 '/Vvert_resolution/Vcolors_used/Vcolors_important', fread($f1,40));
   $BMP['colors'] = pow(2,$BMP['bits_per_pixel']);
   if ($BMP['size_bitmap'] == 0) $BMP['size_bitmap'] = $FILE['file_size'] - $FILE['bitmap_offset'];
   $BMP['bytes_per_pixel'] = $BMP['bits_per_pixel']/8;
   $BMP['bytes_per_pixel2'] = ceil($BMP['bytes_per_pixel']);
   $BMP['decal'] = ($BMP['width']*$BMP['bytes_per_pixel']/4);
   $BMP['decal'] -= floor($BMP['width']*$BMP['bytes_per_pixel']/4);
   $BMP['decal'] = 4-(4*$BMP['decal']);
   if ($BMP['decal'] == 4) $BMP['decal'] = 0;

 //3 : Chargement des couleurs de la palette
   $PALETTE = array();
   if ($BMP['colors'] < 16777216)
   {
	$PALETTE = unpack('V'.$BMP['colors'], fread($f1,$BMP['colors']*4));
   }

 //4 : Cr?ation de l'image
   $IMG = fread($f1,$BMP['size_bitmap']);
   $VIDE = chr(0);

   $res = imagecreatetruecolor($BMP['width'],$BMP['height']);
   $P = 0;
   $Y = $BMP['height']-1;
   while ($Y >= 0)
   {
	$X=0;
	while ($X < $BMP['width'])
	{
	 if ($BMP['bits_per_pixel'] == 24)
		$COLOR = @unpack("V",substr($IMG,$P,3).$VIDE);
	 elseif ($BMP['bits_per_pixel'] == 16)
	 { 
		$COLOR = @unpack("n",substr($IMG,$P,2));
		$COLOR[1] = $PALETTE[$COLOR[1]+1];
	 }
	 elseif ($BMP['bits_per_pixel'] == 8)
	 { 
		$COLOR = @unpack("n",$VIDE.substr($IMG,$P,1));
		$COLOR[1] = $PALETTE[$COLOR[1]+1];
	 }
	 elseif ($BMP['bits_per_pixel'] == 4)
	 {
		$COLOR = @unpack("n",$VIDE.substr($IMG,floor($P),1));
		if (($P*2)%2 == 0) $COLOR[1] = ($COLOR[1] >> 4) ; else $COLOR[1] = ($COLOR[1] & 0x0F);
		$COLOR[1] = $PALETTE[$COLOR[1]+1];
	 }
	 elseif ($BMP['bits_per_pixel'] == 1)
	 {
		$COLOR = @unpack("n",$VIDE.substr($IMG,floor($P),1));
		if     (($P*8)%8 == 0) $COLOR[1] =  $COLOR[1]        >>7;
		elseif (($P*8)%8 == 1) $COLOR[1] = ($COLOR[1] & 0x40)>>6;
		elseif (($P*8)%8 == 2) $COLOR[1] = ($COLOR[1] & 0x20)>>5;
		elseif (($P*8)%8 == 3) $COLOR[1] = ($COLOR[1] & 0x10)>>4;
		elseif (($P*8)%8 == 4) $COLOR[1] = ($COLOR[1] & 0x8)>>3;
		elseif (($P*8)%8 == 5) $COLOR[1] = ($COLOR[1] & 0x4)>>2;
		elseif (($P*8)%8 == 6) $COLOR[1] = ($COLOR[1] & 0x2)>>1;
		elseif (($P*8)%8 == 7) $COLOR[1] = ($COLOR[1] & 0x1);
		$COLOR[1] = $PALETTE[$COLOR[1]+1];
	 }
	 else
		return FALSE;
	 imagesetpixel($res,$X,$Y,$COLOR[1]);
	 $X++;
	 $P += $BMP['bytes_per_pixel'];
	}
	$Y--;
	$P+=$BMP['decal'];
   }

 //Fermeture du fichier
   fclose($f1);

 return $res;
 
} // fim function image from BMP