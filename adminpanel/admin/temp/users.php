
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

    <!--  start page-heading -->
    <h1>Список пользователей</h1>
     <a href="?view=add_customer"><button style="margin-bottom: 15px;" value="" name="" class="add_button" >Добавить пользователя</button></a>
    <!-- end page-heading -->
    
   
    
    
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
                    
                    <th class="table-header-repeat line-left minwidth-1"><a href="">№</a>   </th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Имя</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Email</a></th>
                    <th class="table-header-repeat line-left"><a href="">Роль</a></th>
                    
                    
                    <th class="table-header-options line-left"><a href="">Действие</a></th>
                </tr>
                

                <?php $i=1; ?>
                <?php foreach($users as $item): ?>
                <tr <?php if($item['name_character'] == 'Администратор') echo "class='alternate-row'"; ?>>
                    
                    <td><?=$i?></td>
                    <td><?=htmlspecialchars($item['second_name'])?> <?=htmlspecialchars($item['name'])?> <?=htmlspecialchars($item['otchestvo'])?></td>
                    <td><?=htmlspecialchars($item['email'])?></td>
                    <td><?=htmlspecialchars($item['name_character'])?></td>
                    
                    <td class="options-width" style="text-align: center;">

                    <a href="" title="Просмотр" class="icon-1 info-tooltip"></a>
                    <a href="" title="Удалить" class="del icon-2 info-tooltip"></a>
                    
                    </td>
                </tr>
                <?php $i++; ?>
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
    
        
        
    
    <div class="clear">&nbsp;</div>
    

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    

 
</body>
</html>