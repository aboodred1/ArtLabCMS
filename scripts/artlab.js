function ChangePage(path,htmlID,bool){

	//window.location.href = "?node=8&page=" + htmlID.selectedIndex;
	if(bool) {
		window.location.href = path + "news/page-" + htmlID.selectedIndex + ".html";
	} else {
		window.location.href = "?node=8&page=" + htmlID.selectedIndex;
	}
}

function ChangePageLink(link) {
  window.location.href = link;
}