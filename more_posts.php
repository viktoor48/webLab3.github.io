<?php
require 'db.php';
$page = (int)$_REQUEST['page'];
if ($page <= 0) {
    die();
}
$pageSize = 3;
$offset = $pageSize * ($page - 1);
$sql =  "SELECT * FROM post LIMIT $pageSize OFFSET $offset";
$items = $pdo->query($sql);

foreach ($items as $item): ?>
<article data-pid="<?php print_r($item['id'])?>" class="product_item item_product">
                  <a href="detail_page.php?id=<?php print_r($item['id'])?>" class="item-product_image _ibg">
                      <img src="image/<?php print_r($item['image']) ?>" alt="">
                  </a>
                  <div class="item-product_body">
                       <div class="item-product_content">
                          <h3 class="item-product_title"><?php print_r($item['title'])?></h3>
                          <div class="item-product_text"><?php print_r($item['text']) ?></div>
                       </div>
                      <div class="item-product_prices">
                          <div class="item-product_price">Price <?php print_r($item['price'])?> ₽</div>
                      </div>
                      <div class="item-product_actions actions-product">
                         <div class="actions-product_body">
                               <a href="detail_page.php?id=<?php print_r($item['id'])?>" target="_blank" class="actions-product_button btn btn_white">Show details</a>
                               <a href="#" class="actions-product_link _icon-favorite">Like</a>
                               <ion-icon name ="heart"></ion-icon>
                         </div>
                      </div>
                  </div>
</article>
<?php endforeach;