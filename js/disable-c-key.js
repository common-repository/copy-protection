///////// Disable C-key ////////////////////////

	document.onkeydown = function (event) {
        event = (event || window.event);
        if (event.keyCode == 67) {
            //alert('No C-key');
            return false;
        }
    }