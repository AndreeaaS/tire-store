function sp_f(form)
{
       form.Sp1.value = Math.round((Math.round(form.Wdn.options[form.Wdn.selectedIndex].value*form.Hdn.options[form.Hdn.selectedIndex].value*2
      +form.Rdn.options[form.Rdn.selectedIndex].value*25.4)
      /Math.round(form.Wd.options[form.Wd.selectedIndex].value*form.Hd.options[form.Hd.selectedIndex].value*2
      +form.Rd.options[form.Rd.selectedIndex].value*25.4))*form.Sp.value*100)/100;

      form.Sp2.value = Math.round((form.Sp1.value-form.Sp.value)*100)/100
}

function t_calc(form)
{
   <!--   alert(form);-->
      form.Tw.value = form.Wd.options[form.Wd.selectedIndex].value;
      form.Tw1.value = form.Wdn.options[form.Wdn.selectedIndex].value;
      form.Tw2.value = form.Wdn.options[form.Wdn.selectedIndex].value-form.Wd.options[form.Wd.selectedIndex].value;

      form.Tr.value = Math.round(form.Rd.options[form.Rd.selectedIndex].value*25.4);
      form.Tr1.value = Math.round(form.Rdn.options[form.Rdn.selectedIndex].value*25.4);
      form.Tr2.value = Math.round(form.Rdn.options[form.Rdn.selectedIndex].value*25.4)-Math.round(form.Rd.options[form.Rd.selectedIndex].value*25.4);

      form.Th.value = Math.round(form.Wd.options[form.Wd.selectedIndex].value*form.Hd.options[form.Hd.selectedIndex].value*2
      +form.Rd.options[form.Rd.selectedIndex].value*25.4);
      form.Th1.value = Math.round(form.Wdn.options[form.Wdn.selectedIndex].value*form.Hdn.options[form.Hdn.selectedIndex].value*2
      +form.Rdn.options[form.Rdn.selectedIndex].value*25.4);
      form.Th2.value = Math.round(form.Wdn.options[form.Wdn.selectedIndex].value*form.Hdn.options[form.Hdn.selectedIndex].value*2
      +form.Rdn.options[form.Rdn.selectedIndex].value*25.4)
      -Math.round(form.Wd.options[form.Wd.selectedIndex].value*form.Hd.options[form.Hd.selectedIndex].value*2
      +form.Rd.options[form.Rd.selectedIndex].value*25.4);

      form.Kl.value = (Math.round(form.Wdn.options[form.Wdn.selectedIndex].value*form.Hdn.options[form.Hdn.selectedIndex].value*2
      +form.Rdn.options[form.Rdn.selectedIndex].value*25.4)
      -Math.round(form.Wd.options[form.Wd.selectedIndex].value*form.Hd.options[form.Hd.selectedIndex].value*2
      +form.Rd.options[form.Rd.selectedIndex].value*25.4))/2;

      form.Sp1.value = Math.round((Math.round(form.Wdn.options[form.Wdn.selectedIndex].value*form.Hdn.options[form.Hdn.selectedIndex].value*2
      +form.Rdn.options[form.Rdn.selectedIndex].value*25.4)
      /Math.round(form.Wd.options[form.Wd.selectedIndex].value*form.Hd.options[form.Hd.selectedIndex].value*2
      +form.Rd.options[form.Rd.selectedIndex].value*25.4))*form.Sp.value*100)/100;

      form.Sp2.value = Math.round((form.Sp1.value-form.Sp.value)*100)/100
	}
<!-- done hiding from old browsers -->