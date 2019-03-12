
$(document).ready(function() 
{
  $menu1 = $("#menu1");
  $menu2 = $("#menu2");

  $menu2.hide();
  $folded = true;

  $("#b_kategorie").click(function() {
    if ($folded) 
	{
      $menu1.animate({
        height: '200px'
      });
      $folded = false;
    }
	else
	{
      $menu1.animate({
        height: '40px'
      });
      $folded = true;
	  
    }
    $menu2.toggle();
  });


});





