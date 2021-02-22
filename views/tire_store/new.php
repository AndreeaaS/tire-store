 <?php
defined('CHECK') or die ('Access denied');
?>

 <div class="center__catalog-index">
        
				<h1 style="font-family: Verdana, sans-serif; color: #0067AE; font-weight: normal;">Новинки</h1>
				<?php if($eyestoppers): ?>
                    <?php foreach($eyestoppers as $eyestopper): ?>
                    <?php $available = (int)$eyestopper['available']; ?>
                    <div class="catalog-index__product">
					   <h2><a href="?view=product&goods_id=<?=$eyestopper['goods_id']?>"><?=$eyestopper['name']?></a></h2>
					   <a href="?view=product&goods_id=<?=$eyestopper['goods_id']?>"><img src="<?=TEMPLATE?>images/<?=$eyestopper['image']?>" alt="<?=$eyestopper['name']?>" title="<?=$eyestopper['name']?>"  height="135"/></a>
					   <p>Цена: <span><?=$eyestopper['price']?> руб. </span></p>
                       <div>
                    
                    <?php if($available > 0): ?>
                    <?php
                        echo "<select id='select_number' name='select_count' oncahnge='this.form.submit()'>";
                    ?>
                            <?php for($i=1; $i<=$available; $i++):?>
   
                                <option value="<?=$i?>" <?php // if ($i == 4) {echo "selected";} ?>><?=$i?></option>;
                            <?php endfor;?>
                    <?php
                        echo "</select>";
                    ?>
                     <a  href="?view=addtocart&goods_id=<?=$eyestopper['goods_id']?>"><button value="" name="" class="addtocart_submit" id="auth-button">Добавить в корзину</button></a>
					<!-- <a href="?view=addtocart&goods_id=<?=$product['goods_id']?>"><img class="product-table__addtocard" src="<?=TEMPLATE?>images/addcard-table.jpg" alt="Добавить в корзину" title="Добавить в корзину"/></a>-->
                    
                    <?php else: ?>
                <p><br/>Товар отсутствует в продаже</p>
                <?php endif; ?>
                
                    </div>
                       
					  <!--  <a href="?view=addtocart&goods_id=<?=$eyestopper['goods_id']?>"><img class="product__addtocart-index" src="<?=TEMPLATE?>images/addcard-index.jpg" alt="Добавить в корзину"/></a> -->
                    </div><!-- .catalog-index__product -->
                    <?php endforeach; ?>
                    <div style="clear: both;"><?php if($pages_count > 1) pagination($current_page, $pages_count); ?></div>
                    <?php else: ?>
                   <p style="font:bold 20px Verdana,sans-serif; color: #00678C; text-align: center; ">Данной категории не существует, пока что...</p>
                <?php endif; ?>
			</div> 