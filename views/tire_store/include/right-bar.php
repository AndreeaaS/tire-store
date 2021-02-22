<?php
defined('CHECK') or die ('Access denied');
?>
<!-- Блок правого бара -->
		<div id="content__right-bar">
			<div class="right-bar__cont">
					
				<!--<div class="right-bar__basket">
					<h2><span>Корзина</span></h2>
					<div>
						<p>
							У Вас в корзине <br/>
							<span>1</span> товар на <span>30 456</span> руб.
						</p>
						<a href="#"><img src="<?=TEMPLATE?>images/oformit.jpg" alt="Оформить заказ"></a>
					</div> 
				</div> -->

				<div class="right-bar__share-search">
					<h2><span style="text-align: center;">Подбор шин</span></h2>
					<div>
						<form method="get">
                        
                        
						<p>Стоимость</p>
                        <input type="hidden" name="view" value="filter"/>
						от <input type="text" class="share-search__form-input" name="start-price" value="<?=$startprice;?>"/>
						до <input type="text" class="share-search__form-input" name="end-price" value="<?=$endprice;?>"/>
							руб.
							<br/><br/>
                            <label for="width">Ширина:</label> 
                        <?php
                        echo "<select style='width:50px; height: 20px; padding:0;margin-left:3px;' name='width'>";
                        echo "<option value=0>---</option>";
                        ?>
                        
                        <?php for($i=135; $i<=285; $i=$i+10):?>
                                
                              <option value="<?=$i?>" <?php if (($width) && ($width == $i)) {echo "selected";} ?> > <?=$i?></option>
                           
                        <?php endfor;?>
                        <?php
                        echo "</select>";
                        ?>
                        <br />
                        
                        Высота: 
                        <?php
                        echo "<select style='width:50px; height: 20px; padding:0; margin: 8px 0 0 10px;' name='height'>";
                        echo "<option value=0>---</option>";
                        ?>
                        <?php for($i=35; $i<=85; $i=$i+5):?>
                           
                              <option value="<?=$i?>" <?php if (($height) && ($height == $i)) {echo "selected";} ?>><?=$i?></option>;
                           
                        <?php endfor; ?>
                        <?php
                        echo "</select>";
                        ?>
                        <br />
                        
                        Диаметр: 
                        <?php
                        echo "<select style='width:50px; height: 20px; padding:0; margin-top: 8px;' name='radius'>";
                        echo "<option value=0>---</option>";
                        ?>
                        <?php for($i=12; $i<=21; $i++):?>
                           
                              <option value="<?=$i?>" <?php if (($radius) && ($radius == $i)) {echo "selected";} ?>><?=$i?></option>
                           
                        <?php endfor;?>
                        <?php
                        echo "</select>";
                        ?>
                            <br />
                            <br/>
						<p>Производители</p>
                        <?php foreach ($category as $key => $item): ?>
                            <?php if($item[0]): ?>
                                <input type="checkbox" name="brand[]" value="<?=$key?>" id="<?=$key?>" <?php if($key == $brand[$key]) echo "checked"; ?>/>
                                <label for="<?=$key?>"><?=$item[0]?></label> <br/>
                            <?php endif; ?> 
                        <?php endforeach; ?>
						
                        <p>Сезон: </p>
                        
                            <input type="checkbox" name="season_search[]" value="summer" id="summer_search"  <?php if($season_search['summer']) echo "checked"; ?>/>
                            <label for="summer_search">Лето</label><br/>
                            <input type="checkbox" name="season_search[]" value="winter" id="winter_search"  <?php if($season_search['winter']) echo "checked"; ?>/>
                            <label for="summer_search">Зима</label>
                        <input type="image" class="share-search__form-button" src="<?=TEMPLATE?>images/podbor.jpg"/>
						</form>
					</div>
				</div>
        <!-- Тестовые новости -->
        
			</div>
		

		</div>
 	