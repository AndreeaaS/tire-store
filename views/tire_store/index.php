<?php require_once 'include/header.php' ?>
		<div id="wrapper__content">
		<!-- Блок контента -->
		<div id="content__center">
       
        <?php include $view.'.php' ?>
			
             
		</div>
    </div>
 	
     <?php if (($view != 'registration') AND ($view != 'cart') AND ($view != 'checkout-order') AND ($view != 'personal') ): ?>
     
        <?php require_once 'include/left-bar.php'?>	
        <?php if ($view != 'product') require_once 'include/right-bar.php'?>
        
    <?php endif; ?>
    <div class="clear">	</div>	
    
    <?php require_once 'include/footer.php' ?>		
        <div id="wrapper__top-button"></div>


</body>
</html>