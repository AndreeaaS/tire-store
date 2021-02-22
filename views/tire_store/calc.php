<?php
defined('CHECK') or die ('Access denied');
?>

 <div class="center__catalog-index" style="min-height: 800px;">
            <div class="bread-crumbs">
				
                <a href="<?=PATH?>">Главная</a> /  <span>Шинный калькулятор</span>	
	        </div>	<!-- .bread-crumbs -->
               
                
                
    <form>
    <center>
    
<table class="bord" cellpadding="7" cellspacing="0" width="600" align="center">
  <tbody><tr bgcolor="#35B1DE">
    <th colspan="3" width="50%">
      Старый размер</th>
    <th colspan="3" width="50%">
      Новый размер</th></tr>
  <tr bgcolor="#F5F9FC">
    <td colspan="3" width="40%" align="center"><select class="sim" size="1" name="Wd"> <option value="145">145</option>
        <option value="155">155</option> <option value="165">165</option> <option value="175" selected="selected">175</option> <option value="185">185</option> <option value="195">195</option> <option value="205">205</option> <option value="215">215</option> <option value="225">225</option> <option value="235">235</option> <option value="245">245</option> <option value="255">255</option> <option value="265">265</option> <option value="275">275</option> <option value="285">285</option> <option value="295">295</option> <option value="305">305</option> <option value="315">315</option> <option value="325">325</option> <option value="335">335</option> <option value="345">345</option> <option value="355">355</option></select> <select style="font-size: 8pt;" size="1" name="Hd"> <option value="0.35">35</option> <option value="0.40">40</option>
        <option value="0.45">45</option> <option value="0.50">50</option> <option value="0.55">55</option> <option value="0.60">60</option> <option value="0.65">65</option> <option value="0.70" selected="selected">70</option> <option value="0.75">75</option> <option value="0.80">80</option> <option value="1">-</option></select> <select style="font-size: 8pt;" size="1" name="Rd">
        <option value="12">R12</option> <option value="13" selected="selected">R13</option>
        <option value="14">R14</option> <option value="15">R15</option> <option value="16">R16</option> <option value="17">R17</option> <option value="18">R18</option> <option value="19">R19</option> <option value="20">R20</option> <option value="21">R21</option> <option value="22">R22</option> <option value="23">R23</option> <option value="24">R24</option></select></td>
    <td colspan="3" width="50%" align="center"><select style="font-size: 8pt;" size="1" name="Wdn"> <option value="145">145</option>
        <option value="155">155</option> <option value="165">165</option> <option value="175" selected="selected">175</option> <option value="185">185</option> <option value="195">195</option> <option value="205">205</option> <option value="215">215</option> <option value="225">225</option> <option value="235">235</option> <option value="245">245</option> <option value="255">255</option> <option value="265">265</option> <option value="275">275</option> <option value="285">285</option> <option value="295">295</option> <option value="305">305</option> <option value="315">315</option> <option value="325">325</option> <option value="335">335</option> <option value="345">345</option> <option value="355">355</option></select><select style="font-size: 8pt;" size="1" name="Hdn"> <option value="0.35">35</option> <option value="0.40">40</option>
        <option value="0.45">45</option> <option value="0.50">50</option> <option value="0.55">55</option> <option value="0.60">60</option> <option value="0.65">65</option> <option value="0.70" selected="selected">70</option> <option value="0.75">75</option> <option value="0.80">80</option> <option value="1">-</option></select><select style="font-size: 8pt;" size="1" name="Rdn">
        <option value="12">R12</option> <option value="13" selected="selected">R13</option>
        <option value="14">R14</option> <option value="15">R15</option> <option value="16">R16</option> <option value="17">R17</option> <option value="18">R18</option> <option value="19">R19</option> <option value="20">R20</option> <option value="21">R21</option> <option value="22">R22</option> <option value="23">R23</option> <option value="24">R24</option></select></td></tr>
  <tr>
    <td colspan="6" bgcolor="#F5F9FC" width="100%" align="center">
	
	<input class="frm_inp" onclick="t_calc(this.form)" value="Рассчитать" name="Bt2" type="button">


</td></tr>
  <tr bgcolor="#35B1DE">
    <td colspan="2" rowspan="6" bgcolor="#ffffff" height="277" width="34%"><img src="<?=TEMPLATE?>images/xki_shina.gif" alt="Характеристики шины" border="0" height="250" width="167"></td>
    <th width="17%" align="center">Размеры</th>
    <th width="16%" align="center">Старый</th>
    <th width="16%" align="center">Новый</th>
    <th width="17%" align="center">Разница</th></tr>
  <tr bgcolor="#D3E4F1">
    <td height="22" width="17%"><strong>A (мм)</strong></td>
    <td height="22" width="17%" align="center"><input value="" class="bottons" size="4" name="Tw"></td>
    <td height="22" width="17%" align="center"><input value="" class="bottons" size="4" name="Tw1"></td>
    <td height="22" width="17%" align="center"><input value="" class="bottons" size="4" name="Tw2"></td></tr>
  <tr bgcolor="#D3E4F1">
    <td height="22" width="17%"><strong>C (мм)</strong></td>
    <td height="22" width="17%" align="center"><input value="" class="bottons" size="4" name="Tr"></td>
    <td height="22" width="17%" align="center"><input value="" class="bottons" size="4" name="Tr1"></td>
    <td height="22" width="17%" align="center"><input value="" class="bottons" size="4" name="Tr2"></td></tr>
  <tr bgcolor="#D3E4F1">
    <td height="22" width="17%"><strong>D (мм)</strong></td>
    <td height="22" width="17%" align="center"><input value="" class="bottons" size="4" name="Th"></td>
    <td height="22" width="17%" align="center"><input value="" class="bottons" size="4" name="Th1"></td>
    <td height="22" width="17%" align="center"><input value="" class="bottons" size="4" name="Th2"></td></tr>
  <tr bgcolor="#D3E4F1">
    <td colspan="3" height="22" width="51%"><strong>Изменение
      клиренса (мм)</strong></td>
    <td height="22" width="17%" align="center"><input value="" class="bottons" size="4" name="Kl"></td></tr>
  <tr bgcolor="#D3E4F1">
    <th colspan="4" bgcolor="#F5F9FC" width="100%">
     Погрешность в показаниях спидометра в
      км/час</th></tr>
      
  <tr bgcolor="#35B1DE">
    <th colspan="2" height="22" width="34%">
      Показания спидометра</th>
    <th colspan="2" height="22" width="33%">
     Реальная скорость</th>
    <th colspan="2" height="22" width="33%">
  Разница</th></tr>
  <tr bgcolor="#f4fdfd">
    <td colspan="2" height="22" width="34%" align="center"><input class="bottons" onchange="sp_f(this.form)" size="6" value="90" name="Sp"></td>
    <td colspan="2" height="22" width="33%" align="center"><input value="" class="bottons" size="6" name="Sp1"></td>
    <td colspan="2" height="22" width="33%" align="center"><input value="" class="bottons" size="6" name="Sp2"></td></tr>
  <tr>
    <th colspan="6" bgcolor="#F5F9FC" width="100%">
      Вы можете поменять значение в графе "Показания спидометра" шинного калькулятора для того, чтобы посмотреть погрешность при разных скоростях.</th></tr>
  <tr class="sim_lit">
    <td colspan="6" width="100%"><p align="justify">Данный расчет размеров шин носит теоретический характер. Без крайней необходимости не устанавливайте шины, не рекомендованные
      производителем. </p>
	  
	  <p style="text-align: justify;">Перед установкой шин следует:<br>
	
	 </p><ul style="text-align: justify;">
	  <li style="margin-left: 25px;">удостовериться, что желаемое изменение не вызовет никаких проблем (габариты, механика, кузов...);</li>
	  <li style="margin-left: 25px;">следить, чтобы вновь монтируемые шины соответствовали действующим правилам;</li>
	  <li style="margin-left: 25px;">проверить, чтобы диаметр и ширина обода соответствовали параметрам шины.</li>
	 </ul>

	  <p align="justify">Помните также, что при изменении размеров шины, как правило, изменяется индекс нагрузки.</p>
 </td></tr></tbody></table></form></center>

 
       
       
       
 </div> <!-- .center__catalog-index --> 