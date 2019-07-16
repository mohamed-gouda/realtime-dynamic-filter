<?php
include 'dbcont.php';



if(isset($_POST['request']) && !empty($_POST['request'])){
    $request = $_POST['request'];

    $select_brands = $cont->prepare("SELECT * FROM brands WHERE cat=?");
    $select_brands->execute(array($request));
    $brands = $select_brands->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($brands);

}elseif(isset($_POST['request2']) && !empty($_POST['request2'])){
    $request = $_POST['request'];

    $select_items = $cont->prepare("SELECT * FROM items WHERE brand=?");
    $select_items->execute(array($request));
    $items = $select_items->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($items);
}elseif(isset($_POST['request3']) && !empty($_POST['request3'])){
    $request = $_POST['request'];

    $select_brands = $cont->prepare("SELECT * FROM items WHERE id=?");
    $select_brands->execute(array($request));
    $brands = $select_brands->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($brands);
}





?>