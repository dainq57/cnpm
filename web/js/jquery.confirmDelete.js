function confirmDelete(id){
    var value = confirm('Bạn muốn tiếp tục không ?');
    if(value){
  		window.location = 'del_user.php?userid=' + id;
    }
   	return false;
}