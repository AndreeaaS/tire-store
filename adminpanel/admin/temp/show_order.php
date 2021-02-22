
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

    <!--  start page-heading -->
    <div id="page-heading">
        <h1>Просмотр заказа №<?=$order_id?></h1>
        
    </div>
    <!-- end page-heading -->
    <?php if($show_order): ?>
        <?php print_arr($show_order) ?>
    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
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
                

               
                <tr class="alternate-row">
                    
                    <td></td>
                    <td></td>
                    <td></td>
                    
                    
                    <td class="options-width" style="text-align: center;">

                    <a href="?view=show_order&amp;order_id=<?=$item['order_id']?>" title="Просмотр" class="icon-1 info-tooltip"></a>
                    <a href="" title="Удалить" class="del icon-2 info-tooltip"></a>
                    
                    </td>
                </tr>
                
                
                
                
                </table>

                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                <tr>
                    
                    <th class="table-header-repeat line-left minwidth-1"><a href="">ФИО</a>   </th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Адрес</a></th>
                    <th class="table-header-repeat line-left"><a href="">Контактные данные</a></th>
                    
                    
                    <th class="table-header-options line-left"><a href="">Примечание</a></th>
                </tr>
                

               
                <tr class="alternate-row">
                    
                    <td></td>
                    <td></td>
                    <td></td>
                    
                    
                    <td class="options-width" style="text-align: center;">

                    <a href="?view=show_order&amp;order_id=<?=$item['order_id']?>" title="Просмотр" class="icon-1 info-tooltip"></a>
                    <a href="" title="Удалить" class="del icon-2 info-tooltip"></a>
                    
                    </td>
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