function arata_ascunde(input) {
    var x = document.getElementById('showhide');
    var change = document.getElementById("show_hide_bt");

    if (x.style.display === 'none') {
      x.style.display = 'block';
    } else {
      x.style.display = 'none';
    }

    if (change.innerHTML == ' Show')
           {

               change.innerHTML = ' Hide';
               $(button).find('i').toggleClass('fa-eye').toggleClass('fa-eye-slash');
           }
           else {

               change.innerHTML = ' Show';
               $(button).find('i').toggleClass('fa-eye-slash').toggleClass('fa-eye');
           }


 }
