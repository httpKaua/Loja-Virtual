<?php
include 'header.php';
include 'veiculos.class.php';
error_reporting(E_ERROR | E_PARSE);
session_start();

if (isset($_POST['send'])) {
    $id = $_POST['add'];
    if (isset($_SESSION['cars'][$id])) {
        $_SESSION['cars'][$id]->quantidade++;
    } else {
        $carro = new Veiculos;
        $m = $_POST['modelo'];
        $p = $_POST['preco'];
        $i = $_POST['imagem'];

        $carro->modelo = $m;
        $carro->preco = $p;
        $carro->img = $i;
        $carro->quantidade = 1;
        $_SESSION['cars'][$id] = $carro;
        // ksort($_SESSION['cars']);
    }
}
$total = 0;
$items = 0;
?>

<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<section class="h-100 h-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Carrinho de Compras</h1>
                                    </div>
                                    <h6 class="mb-0" style="text-align: right;"><a href="?limpar" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Limpar Carrinho</a></h6>

                                    <?php
                                    //Finalizando Compra
                                    if (isset($_GET['finalizar'])) {
                                        unset($_SESSION['cars']);
                                        header("Location: ./");
                                    }

                                    if (isset($_GET['adicionar'])) {
                                        //Adicionando quantidade
                                        $id = $_GET['adicionar'];
                                        $_SESSION['cars'][$id]->quantidade++;                   
                                        header("Location: ./carrinho.php");
                                    }

                                    if (isset($_GET['remover'])) {
                                        //Removendo quantidade
                                        $id = $_GET['remover'];
                                        if ($_SESSION['cars'][$id]->quantidade < 2) {
                                            $_SESSION['cars'][$id]->quantidade = 1;
                                        } else $_SESSION['cars'][$id]->quantidade--;
                                        header("Location: ./carrinho.php");
                                    }

                                    if (isset($_GET['deletar'])) {
                                        unset($_SESSION['cars'][$_GET['deletar']]);
                                        // ksort($_SESSION['cars']);
                                        header("Location: ./carrinho.php");
                                    }

                                    if (isset($_GET['limpar'])) {
                                        unset($_SESSION['cars']);
                                        header("Location: ./carrinho.php");
                                    }
                                    ?>

                                    <?php foreach ($_SESSION['cars'] as $key => $value) { ?>
                                        <hr class="my-4">
                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="<?php echo $value->img ?>" class="img-fluid rounded-3" alt="...">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-muted">Veículo</h6>
                                                <h6 class="text-black mb-0"><?php echo $value->modelo ?></h6>
                                            </div>



                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <a href="?remover=<?php echo $key ?>" class="btn btn-link px-2"><img class="minus" src="./img/minus.png" alt=""></a>
                                                <input id="form1" min="1" name="quantity" value="<?php echo $value->quantidade ?>" type="number" class="form-control form-control-sm" />
                                                <a href="?adicionar=<?php echo $key ?>" class="btn btn-link px-2"><img class="plus" src="./img/plus.png" alt=""></a>
                                            </div>

                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h6 class="mb-0">R$ <?php echo $value->preco * $value->quantidade ?></h6>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#d<?php echo $key ?>" class="btn btn-link px-2" data-mdb-ripple-color="dark"><img class="delete" src="./img/delete.png" alt=""></button>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="d<?php echo $key ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Atenção!</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5><b>Deseja remover o item selecionado do carrinho?</b></h5><br>
                                                        <h6>CarsCenter©.</h6>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="?deletar=<?php echo $key ?>" class="btn btn-danger">Remover</a>
                                                        <button type="button" data-bs-dismiss="modal" aria-label="Cancelar" class="btn btn-secondary">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4">

                                    <?php
                                        $total += $value->preco * $value->quantidade;
                                        $items++;
                                    } ?>

                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="./" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Voltar para loja</a></h6>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Resumo</h3>
                                    <hr class="my-4">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase"><?php echo $items . ' Items'; ?></h5>
                                        <h5><?php echo 'R$ ' . number_format($total, 2, ',', '.') ?></h5>
                                    </div>
                                    <h5 class="text-uppercase mb-3">Cupom de desconto</h5>
                                    <form action="" method="get">
                                        <div class="mb-5">
                                            <div class="form-outline">
                                                <input type="text" name="cupom" id="form3Examplea2" class="form-control form-control-lg" value="<?php echo $_GET['cupom'] ?>" />
                                                <br>
                                                <button type="submit" name="desconto" class="btn btn-dark btn-block" data-mdb-ripple-color="dark">Aplicar</button>
                                            </div>
                                        </div>
                                    </form>

                                    <?php if (isset($_GET['desconto'])) {
                                        $cp = $_GET['cupom'];
                                        if ($cp == 'Izaque') {
                                            $total *= 0.7;
                                            echo 'Cupom: "Izaque" 30% de Desconto.';
                                        }
                                    } ?>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h6 class="text-uppercase">Total da compra</h6>
                                        <h6><?php echo 'R$ ' . number_format($total, 2, ',', '.') ?></h6>
                                    </div>

                                    <button data-bs-toggle="modal" data-bs-target="#finish" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Finalizar Compra</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Finalizar Compra -->
<div class="modal fade" id="finish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php if (empty($_SESSION['cars'])) { ?>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Atenção!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5><b>Adicione algum produto no carrinho!</b></h5><br>
                    <h6>Atenciosamente, <br>CarsCenter©.</h6>
                </div>
                <div class="modal-footer">
                    <a href="?finalizar" class="btn btn-secondary">Fechar</a>
                </div>
            <?php } else { ?>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Atenção</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5><b>Compra realizada com sucesso!</b></h5><br>
                    <h5 class="text-uppercase"><?php echo $items . ' Items'; ?></h5>
                    <h5><?php echo 'R$ ' . number_format($total, 2, ',', '.') ?></h5><br>
                    <h5>Agradecemos pela preferência, volte sempre!</h5>
                    <h6>CarsCenter©.</h6>
                </div>
                <div class="modal-footer">
                    <a href="?finalizar" class="btn btn-success">Confirmar</a>
                </div>
            <?php }
            ?>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>