
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

    <!--  start page-heading -->
    <div id="page-heading">
        <h1>Просмотр заказа №<?=$order_id?> (<?=$state;?>)</h1>
        
    </div>
    <!-- end page-heading -->
    <?php if($show_order): ?>
        <div style=" margin-top: -15px;">
        <?php if($show_order[0]['status'] == 0): ?>
        <a href="?view=orders&amp;confirm=<?=$order_id?>"><button value="" name="" class="add_button" style="background: #16A05D;">Подтвердить</button></a>
         <?php endif; ?>
         <a href="?view=orders&amp;del_order=<?=$order_id?>"><button value="" name="" class="del add_button" style="background: #AB0000;">Удалить</button></a>
        </div>
    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table" style="margin-top: 5px;">
    <tr>
        <th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
        <th class="topleft"></th>
        <td id="tbl-border-top">&nbsp;</td>
        <th class="topright"></th>
        <th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
    </tr>
    <tr>
        <td id="tbl-border-left"></td>
        <td>
        <!--  start content-table-inner ...................................................................... START -->
        <div id="content-table-inner">
        
            <!--  start table-content  -->
            <div id="table-content">
                
                
        
            
                <!--  start product-table ..................................................................................... -->
                <form id="mainform" action="">
                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                <tr>
                    
                    <th class="table-header-repeat line-left minwidth-1"><a href="">№</a>   </th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Название товара</a></th>
                    <th class="table-header-repeat line-left"><a href="">Цена</a></th>
                    <th class="table-header-options line-left"><a href="">Количество</a></th>
                </tr>
                
                <?php $i = 1; $total_sum = 0;?>

               <?php foreach($show_order as $item): ?>
                <tr >
                    
                    <td><?=$i?></td>
                    <td><?=$item['name']?></td>
                    <td><?=$item['price']?></td>
                    
                    
                    <td><?=$item['quantity']?></td>
                </tr>
                <?php $i++; $total_sum += $item['price'] * $item['quantity'];?>
                <?php endforeach; ?>
                </table>
                <h2>Общая цена заказа: <span style="color: #e35a0f;"><?=$total_sum;?></span></h2>
                <h2>Дата заказа: <span style="color: #e35a0f;"><?=$item['order_date']?></span></h2>
                <h2>Способ доставки: <span style="color: #e35a0f;"><?=$item['sposob']?></span></h2>
                
                
                <center><h2 style="font-size: 25px;">Данные о заказчике</h2></center>
                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                <tr>
                    
                    <th class="table-header-repeat line-left minwidth-1"><a href="">ФИО</a>   </th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Адрес</a></th>
                    <th class="table-header-repeat line-left"><a href="">Контактные данные</a></th>
                    <th class="table-header-options line-left"><a href="">Примечание</a></th>
                </tr>
                
                <tr>
                    <td><?=htmlspecialchars($item['second_name'])?> <?=htmlspecialchars($item['customer'])?> <?=htmlspecialchars($item['otchestvo'])?></td>
                    <td><?=htmlspecialchars($item['address'])?></td>
                    <td><span style="font-weight: bold;">Телефон</span>:&nbsp <?=htmlspecialchars($item['phone'])?><br />
                        <span style="font-weight: bold;">Email</span>:&nbsp <?=htmlspecialchars($item['email'])?></td>
                    <td><?=htmlspecialchars($item['comment'])?></td>
                </tr>
                
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
    <?php else: ?>
<!--  start message-red -->
                <div id="message-red">
                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="red-left">Системное сообщение. <a href="?view=new_orders">Заказа с таким номером не существует!</a></td>
                    <td class="red-right"><a class="close-red"><img src="<?=ADMIN_TEMPLATE?>images/table/icon_close_red.gif"   alt="" /></a></td>
                </tr>
                </table>
                </div>
                <!--  end message-red -->
    <?php endif; ?>
    <div class="clear">&nbsp;</div>
</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>

<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
</body>
</html>