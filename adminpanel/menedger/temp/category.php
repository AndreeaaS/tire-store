
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

    <!--  start page-heading -->
    <div id="page-heading">
    <?php $get = getbrand($cat); ?>
        <h1>Редактирование категории <strong><?=$get?></strong></h1>
        <a href="?view=add_product&amp;brand_id=<?=$cat?>"><button value="" name="" class="add_button" >Добавить товар</button></a>
        
    </div>
    <!-- end page-heading -->
    <?php
if(isset($_SESSION['answer'])){
    echo $_SESSION['answer'];
    unset($_SESSION['answer']);
}
//print_arr($products)
?>
    <?php if($products): // если есть товары?>
    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
    <tr>
        <th rowspan="3" class="sized"><img src="<?=ADMIN_TEMPLATE?>images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
        <th class="topleft"></th>
        <td id="tbl-border-top">&nbsp;</td>
        <th class="topright"></th>
        <th rowspan="3" class="sized"><img src="<?=ADMIN_TEMPLATE?>images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
    </tr>
    <tr>
        <td id="tbl-border-left"></td>
        <td>
        <!--  start content-table-inner ...................................................................... START -->
        <div id="content-table-inner">
        
            <!--  start table-content  -->
            <div id="table-content">
                
                
        
            
                <!--  start product-table ..................................................................................... -->
                <?php
                $col = 4; // количество ячеек в строке
                $row = ceil((count($products)/$col)); // количество рядов
                $start = 0;
                ?>
                <form id="mainform" action="">
                <table class="tabl-kat" cellspacing="1">
<?php for($i = 0; $i < $row; $i++): // цикл вывода рядов ?>
  <tr>
  <?php for($k = 0; $k < $col; $k++): // цикл вывода ячеек ?>
    <td>
        <?php if($products[$start]): // если есть товар ?>
        <h2><?=$products[$start]['name']?></h2>
            <div class="product-table__img">
        <center><img src="<?=ADMIN_TEMPLATE?>images/<?=$products[$start]['image']?>" alt="<?=$products[$start]['name']?>" width="98px" height="140px" title="<?=$products[$start]['name']?>"/></center>
            </div>
        <p><a href="?view=edit_product&amp;goods_id=<?=$products[$start]['goods_id']?>" class="edit">изменить</a>&nbsp; | &nbsp;<a href="?view=del_product&amp;goods_id=<?=$products[$start]['goods_id']?>" class="del">удалить</a></p>
        <?php else: // если нет товара ?>
            &nbsp;
        <?php endif; // перенос внутрь ячейки ?>
        <?php $start++; ?>    
    </td>
  <?php endfor; // конец цикла вывода ячеек ?>
  </tr>
<?php endfor; // конец цикла вывода рядов ?>
                </table>
                <!--  end product-table................................... --> 
                </form>
            
            </div>
            <!--  end content-table  -->
        
            
            
        
            
            <div class="clear"></div>
         
        </div>
        <!--  end content-table-inner ............................................END  -->
        </td>
        <td id="tbl-border-right"></td>
    </tr>
    <tr>
        <th class="sized bottomleft"></th>
        <td id="tbl-border-bottom">&nbsp;</td>
        <th class="sized bottomright"></th>
    </tr>

    </table>
    <?php else: // если нет товаров ?>
<!--  start message-red -->
                <div id="message-red">
                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="red-left">Системное сообщение. <a href="?view=new_orders">Товары отсутствуют!</a></td>
                    <td class="red-right"><a class="close-red"><img src="<?=ADMIN_TEMPLATE?>images/table/icon_close_red.gif"   alt="" /></a></td>
                </tr>
                </table>
                </div>
                <!--  end message-red -->
    <?php endif; // конец условия: если есть товары ?>
    <div class="clear">&nbsp;</div>
    

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>

<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    

 
</body>
</html>