<?php
class ProductModel extends DB
{
    function getAll($keyword = '', $id = 0, $cate_id = 0)
    {
        $select = "SELECT * FROM products WHERE 1";
        if (!empty($keyword)) {
            $select .= " AND  name like '%" . $keyword . "%'";
        }

        if ($id > 0) {
            $select .= " AND id <> $id";
        }
        if ($cate_id > 0) {
            $select .= " AND cate_id = $cate_id";
        }
        $select .= " ORDER BY id DESC";
        return $this->pdo_query($select);
    }

    function countProduct() {
        return $this->pdo_query_value('SELECT count(*) FROM products');
    }

    function SelectProByPage($start, $num_per_page, $keyword = '', $id = 0, $cate_id = 0) {
        $select = "SELECT * FROM products ";
        if (!empty($keyword)) {
            $select .= " WHERE  name like '%" . $keyword . "%'";
        }

        if ($id > 0) {
            $select .= " WHERE id <> $id";
        }
        if ($cate_id > 0) {
            $select .= " WHERE cate_id = $cate_id";
        }
        $select .= "  ORDER BY id DESC LIMIT $start, $num_per_page";
        return $this->pdo_query($select);
    }

    function getNewProduct($cate_id = 0){
        $select = "SELECT * from products WHERE 1 order by created_at DESC";
        return $this->pdo_query($select);
    }

    function insertPro($name, $image, $cate_id, $price, $desc, $created_at)
    {
        $pro = "INSERT INTO products(name, image, cate_id, price, description, created_at) VALUES('$name', '$image', '$cate_id','$price', '$desc', '$created_at')";
        return $this->pdo_execute_lastInsertID($pro);
    }

    function addImageProduct($productId, $image, $created_at)
    {
        $insert = "INSERT INTO img_product(product_id, image, created_at) VALUES('$productId', '$image', '$created_at')";
        return $this->pdo_execute($insert);
    }

    function deletePro($id)
    {
        $delete_img = "DELETE FROM img_product WHERE product_id = '$id'";
        $delete = "DELETE FROM products WHERE id = '$id'";
        $this->pdo_execute($delete_img);
        return $this->pdo_execute($delete);
    }

    function SelectProduct($id)
    {
        $select = "SELECT * FROM products WHERE id = '$id'";
        if ($this->pdo_query_one($select)) {
            return $this->pdo_query_one($select);
        } else {
            return [];
        }
    }





    function SelectProductImg($id)
    {
        $select = "SELECT * FROM img_product WHERE product_id = '$id'";
        if ($this->pdo_query($select)) {
            return $this->pdo_query($select);
        } else {
            return [];
        }
    }

    function updateProduct($id, $name, $image, $cate_id, $price, $desc, $updated_at)
    {
        if (empty($image)) {
            $update = "UPDATE products SET name = '$name', cate_id = '$cate_id', price = '$price', description = '$desc', updated_at = '$updated_at' WHERE id = '$id'";
        } else {
            $update = "UPDATE products SET name = '$name', image = '$image', cate_id = '$cate_id', price = '$price', description = '$desc', updated_at = '$updated_at' WHERE id = '$id'";
        }
        return $this->pdo_execute($update);
    }

    function deleteImgPro($id)
    {
        $delete = "DELETE FROM img_product WHERE product_id = '$id'";
        return $this->pdo_execute($delete);
    }

    function updateImgProduct($productId, $image, $updated_at)
    {
        $update = "UPDATE img_product SET image = '$image', updated_at = '$updated_at' WHERE product_id = '$productId'";
        return $this->pdo_execute($update);
    }

    function getTrendPro()
    {
        $pro = "SELECT * FROM products ORDER BY view DESC LIMIT 3 ";
        return $this->pdo_query($pro);
    }

    function getTrendProImg($id)
    {
        $select = "SELECT * FROM img_product WHERE product_id = '$id' LIMIT 1";
        if ($this->pdo_query_one($select)) {
            return $this->pdo_query_one($select);
        } else {
            return [];
        }
    }

    function getProImg($id)
    {
        $select = "SELECT * FROM img_product WHERE product_id = '$id'";
        if ($this->pdo_query_one($select)) {
            return $this->pdo_query_one($select);
        } else {
            return [];
        }
    }

    function addCart($id) {
        
        
        // return $this->pdo_query_one($select);
        $select = "SELECT * FROM products WHERE id = '$id'";
        $qty = 1;
        if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
            $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
        }
        $product = $this->pdo_query_one($select);
        // show_array($product);
        $_SESSION['cart']['buy'][$id] = array(
            'id' => $product['id'],
            'image' => $product['image'],
            'name' => $product['name'],
            'price' => $product['price'],
            'qty' => $qty,
            
            'sub_total' => $product['price'] * $qty,
        );
        

    }

    function infoCart() {
        if(isset($_SESSION['cart'])) {
            return $_SESSION['cart']['info'];
        }
    }

    function addProductCart($id, $number = 1)
    {
        $itemPro = $this->SelectProduct($id);
        $itemPro['number'] = $number;
        $itemPro['total'] = $itemPro['number'] * $itemPro['price'];

        $check = 0;
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

            foreach ($_SESSION['cart'] as $key => $item) {
                if (isset($item['id']) && $item['id']) {

                    if ($item['id'] == $id) {
                        if ($number > 1) {
                            $item['number'] = $item['number'] + $number;
                        } else  if ($number == 1) {

                            $item['number']++;
                        } else {
                            $item['number']--;
                        }
                        $item['total'] = $item['number'] * $item['price'];
                        $itemNew = $item;
                        $keyNew  = $key;
                        $check = 1;
                    }
                }
            }
            if ($check == 1) {
                $_SESSION['cart'][$keyNew] = [];
                $_SESSION['cart'][$keyNew] = $itemNew;
            } else {

                array_push($_SESSION['cart'], $itemPro);
            }
        } else {
            $_SESSION['cart'] = [];
            array_push($_SESSION['cart'], $itemPro);
        }
        return json_encode($_SESSION['cart']);
    }

    function  removeItem($id)
    {
        if (isset($_SESSION['cart']) && $_SESSION['cart']) {
            $keyRemove = -1;
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $id) {
                    $keyRemove = $key;
                }
            }
            if ($keyRemove > -1) {
                array_splice($_SESSION['cart'], $keyRemove, 1);
            }
        }
        return json_encode($_SESSION['cart']);
    }
}
