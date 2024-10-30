function cp_disableselect(e){
	return false
	}
	function reEnable(){
	return true
	}
	document.onselectstart=new Function ("return false")
	if (window.sidebar){
	document.onmousedown=cp_disableselect
	document.onclick=reEnable
}
