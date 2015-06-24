function confirmDeletecontent(id){
    var value = confirm('Bạn muốn tiếp tục không ?');
    if(value){
  		window.location = 'del_user2.php?userid=' +id;
    }
   	return false;
}