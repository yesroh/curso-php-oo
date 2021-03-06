<?php
require_once("classes\Produto.php");
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");
verificaUsuario();

$produto = new Produto();

$produto->nome = $_POST['nome'];
$produto->preco = $_POST['preco'];
$produto->descricao = $_POST['descricao'];
$produto->categoria_id = $_POST['categoria_id'];

if(array_key_exists('usado', $_POST)) {
    $usado = "true";
} else {
    $usado = "false";
}

$produto->usado = $usado;


if(insereProduto($conexao, $produto)) { ?>
	<p class="text-success">O produto <?= $produto->nome ?>, <?= $produto->preco ?> foi adicionado.</p>
<?php } else {
	$msg = mysqli_error($conexao);
?>
	<p class="text-danger">O produto <?= $produto->nome ?> não foi adicionado: <?= $msg?></p>
<?php
}
?>

<?php include("rodape.php"); ?>
