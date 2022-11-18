<?php

class Veiculos
{
    var $modelo, $quantidade, $preco, $img, $quilom, $cambio, $comb, $ano;
    // public function Remov()
    // {
        
    //     if ($_SESSION['cars'][$id]->quantidade < 2) {
    //         $_SESSION['cars'][$id]->quantidade = 1;
    //     } else $_SESSION['cars'][$id]->quantidade--;
    // }
}
// $id = $_GET['adicionar'];
// $_SESSION['cars'][$id]->quantidade++;



$c1 = new Veiculos;
$c1->modelo = "Renault - Kwid Outsid 1.0MT";
$c1->preco = 62900;
$c1->img = "https://tcarmultimarcas.com.br/wp-content/uploads/2022/10/d1d9f7eb844d47afb303b4906bdf31c0_1666620488548-1024x768.jpg";
$c1->quilom = "50.432";
$c1->cambio = "Manual";
$c1->comb = "Álc./Gasol.";
$c1->ano = "2021";

$c2 = new Veiculos;
$c2->modelo = "Chevrolet - Cruze LTZ NB";
$c2->preco = 86900;
$c2->img = "https://tcarmultimarcas.com.br/wp-content/uploads/2022/11/e0aeda6487e741148af630c93fd90f27_1667579158885.jpg";
$c2->quilom = "75.600";
$c2->cambio = "Automático";
$c2->comb = "Álc./Gasol.";
$c2->ano = "2017";

$c3 = new Veiculos;
$c3->modelo = "Honda - CR-V LX Flex";
$c3->preco = 46499;
$c3->img = "https://tcarmultimarcas.com.br/wp-content/uploads/2022/11/315e62a59cda416790e59e33f8040e99_1663769621511.jpg";
$c3->quilom = "123131";
$c3->cambio = "Automático";
$c3->comb = "Álc./Gasol.";
$c3->ano = "2013";

$c4 = new Veiculos;
$c4->modelo = "Toyota - Etios SD XPLUS AT";
$c4->preco = 72900;
$c4->img = "https://tcarmultimarcas.com.br/wp-content/uploads/2022/11/c6eaab288d674b1a97908487bfecbb36_1667580157675-1024x768.jpg";
$c4->quilom = "49183";
$c4->cambio = "Automático";
$c4->comb = "Álc./Gasol.";
$c4->ano = "2020";

$c5 = new Veiculos;
$c5->modelo = "Toyota - Hilux CD SRV 4x4";
$c5->preco = 120900;
$c5->img = "https://tcarmultimarcas.com.br/wp-content/uploads/2022/10/84d86c9057e94d94b02fa4c92002bb98_1666364229006.jpg";
$c5->quilom = "144345";
$c5->cambio = "Automático";
$c5->comb = "Diesel";
$c5->ano = "2009";

$c6 = new Veiculos;
$c6->modelo = "Fiat - Argo Drive 1.0";
$c6->preco = 60900;
$c6->img = "https://tcarmultimarcas.com.br/wp-content/uploads/2022/11/fead44f98fd14cc68db07b55381ab44b_1667324018485-1024x768.jpg";
$c6->quilom = "52086";
$c6->cambio = "Manual";
$c6->comb = "Álc./Gasol.";
$c6->ano = "2019";

$carros = [$c1, $c2, $c3, $c4, $c5, $c6];
