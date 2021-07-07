<?php
include "dbinit.php";

if (isset($_POST['id_product'])) {
    $id_product = $_POST['id_product'];
    $id_user = $_POST['id_user'];
    $resp = "INSERT INTO cart VALUES(null, '1','$id_product', '1')";
    $arr = getArrPole($link, 'cart', 'id_user');
    $flag = false;

   if ($arrIndex = array_keys($arr, $id_user)) {

        foreach ($arrIndex as $key => $val) {
            if ($id_product == getArrPole($link, CART, 'id_product')["$val"]) {
                $index_i = getArrPole($link, CART, 'id')["$val"];
                $flag = true;
            }
        }
        if ($flag) {
            if ($_POST['oper'] == "+") {


                mysqli_query($link, $query->incPole($index_i, CART, 'quantity'));
                echo json_encode(['res'=> '+']);
              
            }else {
                echo json_encode(['res'=> '-']) ;
                mysqli_query($link, $query->decPole($index_i, CART, 'quantity'));
            }
        } else {
            $res = mysqli_query($link, $query->addOneRow_4(CART, null, $id_user, $id_product, '1'));
        }
    } else {
        $res = mysqli_query($link, $query->addOneRow_4(CART, null, $id_user, $id_product, '1'));
    } 
}
