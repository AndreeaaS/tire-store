
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

    <!--  start page-heading -->
    <div id="page-heading">
    <?php if ($status): ?>
        <h1>Необработанные заказы</h1>
    <?php else: ?>
        <h1>Все заказы <span style="font-size: 14px;">(Необработанные заказы подсвечиваются)</span></h1>
    <?php endif; ?>
    </div>
    <!-- end page-heading -->
    <?php if($orders): ?>
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
                <?php
if(isset($_SESSION['answer'])){
    echo $_SESSION['answer'];
    unset($_SESSION['answer']);
}
?>
                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                <tr>
                    
                    <th class="table-header-repeat line-left minwidth-1"><a href="">№ заказа</a>   </th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Покупатель</a></th>
                    <th class="table-header-repeat line-left"><a href="">Дата</a></th>
                    
                    
                    <th class="table-header-options line-left"><a href="">Действие</a></th>
                </tr>
                

                <?php foreach($orders as $item): ?>
                <tr <?php if($item['status'] == 0) echo "class='alternate-row'"; ?> >
                    
                    <td><?=$item['order_id']?></td>
                    <td><?=htmlspecialchars($item['second_name'])?> <?=htmlspecialchars($item['name'])?>  <?=htmlspecialchars($item['otchestvo'])?></td>
                    <td><?=$item['order_date']?></td>
                    
                    
                    <td class="options-width" style="text-align: center;">

                    <a href="?view=show_order&amp;order_id=<?=$item['order_id']?>" title="Просмотр" class="icon-1 info-tooltip"></a>
                    <a href="?view=orders&amp;del_order=<?=$item['order_id']?>" title="Удалить" class="del icon-2 info-tooltip"></a>
                    
                    </td>
                </tr>
                
                
                <?php endforeach; ?>
                
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
    <?php if($pages_count > 1) pagination($current_page, $pages_count); ?>
    <?php else: ?>
        <!--  start message-green -->
        
                <div id="message-green">
                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="green-left">На данный момент необработанных заказов не наблюдается. </td>
                    <td class="green-right"><a class="close-green"><img src="<?=ADMIN_TEMPLATE?>images/table/icon_close_green.gif"   alt="" /></a></td>
                </tr>
                </table>
                </div>
                
                <!--  end message-green -->
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