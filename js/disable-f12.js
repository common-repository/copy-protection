document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 85 ||
             e.keyCode === 67)) {

            return false;
        } else {
            return true;
        }
};

$(document).keydown(function(event){
    if(event.keyCode==123){
    return false;
   }
else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
      return false;  //Prevent from ctrl+shift+i
   }
});