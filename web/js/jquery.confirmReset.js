function confirmReset(id){
    var value = confirm('Bạn muốn tiếp tục không ?');
    if(value){
  		window.location = 'reset_user.php?userid=' + id;
    }
   	return false;
}