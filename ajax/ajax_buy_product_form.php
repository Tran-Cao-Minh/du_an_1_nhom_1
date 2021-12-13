<?php
  include_once '../global/connect_database.php';
  $conn = connectDatabase();

  if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
 
    $sql = "SELECT 
              `ProductName`, 
              `ProductPrice`
            FROM `product` 
            WHERE`PkProduct_Id` = '$product_id'";
  
    $stmt = $conn->query($sql);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $product_name = $product['ProductName'];
    $product_price = $product['ProductPrice'];
  
    $sql = "SELECT 
              p_i.`ImageFileName`,
              pv.`FkColor_Id`, 
              pv.`ProductSize`, 
              pv.`ProductQuantity`
            FROM `product_variant` pv
            INNER JOIN `product_image` p_i 
              ON pv.`FkProduct_Id` = p_i.`FkProduct_Id`
              AND pv.`FkColor_Id` = p_i.`FkColor_Id`
            WHERE pv.`FkProduct_Id` = '$product_id'
            GROUP BY pv.`FkColor_Id`, pv.`ProductSize`";
  
    $stmt = $conn->query($sql);
    $product_variant_list = $stmt->fetchALL(PDO::FETCH_ASSOC);
      
    $prev_product_variant_img = '';
    $prev_product_variant_color = '';
    $prev_product_variant_size = '';
    $prev_product_variant_amount = '';
    $output = '';
    foreach ($product_variant_list as $product_variant) {
      if ($prev_product_variant_color != $product_variant['FkColor_Id']) {
        if ($prev_product_variant_color != '') {
          $prev_product_variant_size = substr($prev_product_variant_size, 0, -1);
          $prev_product_variant_amount = substr($prev_product_variant_amount, 0, -1);
          $output .= '
            <label class="product__filter-item-color">
              <input type="radio" 
                class="js-get-product-variant-color"
                name="product_variant_color_in_buy_product_form"
                id="buy_product_form_'.$prev_product_variant_color.'"
                data-size="'.$prev_product_variant_size.'"
                data-quantity="'.$prev_product_variant_amount.'"
                data-image="'.$prev_product_variant_img.'"
                data-name="'.$product_name.'"
                data-price="'.$product_price.'"
                data-color-id="'.$prev_product_variant_color.'"
              >
              <label class="product__filter-label--circle" 
                for="buy_product_form_'.$prev_product_variant_color.'" 
                style="--bg-color: #'.$prev_product_variant_color.';"
              >
              </label>
            </label>
          ';
        }
        $prev_product_variant_img = $product_variant['ImageFileName'];
        $prev_product_variant_color = $product_variant['FkColor_Id'];
        $prev_product_variant_size = $product_variant['ProductSize'].' ';
        $prev_product_variant_amount = $product_variant['ProductQuantity'].' ';
      } else {
        $prev_product_variant_size .= $product_variant['ProductSize'].' ';
        $prev_product_variant_amount .= $product_variant['ProductQuantity'].' ';
      }
    }
  
    // add last product variant into container
    $prev_product_variant_size = substr($prev_product_variant_size, 0, -1);
    $prev_product_variant_amount = substr($prev_product_variant_amount, 0, -1);
    $output .= '
      <label class="product__filter-item-color">
        <input type="radio" 
          class="js-get-product-variant-color"
          name="product_variant_color_in_buy_product_form"
          id="buy_product_form_'.$prev_product_variant_color.'"
          data-size="'.$prev_product_variant_size.'"
          data-quantity="'.$prev_product_variant_amount.'"
          data-image="'.$prev_product_variant_img.'"
          data-name="'.$product_name.'"
          data-price="'.$product_price.'"
          data-color-id="'.$prev_product_variant_color.'"
        >
        <label class="product__filter-label--circle" 
          for="buy_product_form_'.$prev_product_variant_color.'" 
          style="--bg-color: #'.$prev_product_variant_color.';"
        >
        </label>
      </label>
    ';
    echo $output;
  } 
  $conn = null;
?>