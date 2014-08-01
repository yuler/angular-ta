$(function(){
	// $('[tipsy]').tipsy();
	// $('[tipsy-nw]').tipsy({gravity: 'nw'});
	// $('[tipsy-n]').tipsy({gravity: 'n'});
	// $('[tipsy-ne]').tipsy({gravity: 'ne'});
	// $('[tipsy-w]').tipsy({gravity: 'w'});
	// $('[tipsy-e]').tipsy({gravity: 'e'});
	// $('[tipsy-sw]').tipsy({gravity: 'sw'});
	// $('[tipsy-s]').tipsy({gravity: 's'});
	// $('[tipsy-se]').tipsy({gravity: 'se'});
	
	// $('a').mousedown(function(event) {
	// 	$(this).addClass('active');
	// 	$(this).mouseleave(function(event) {
	// 		$(this).removeClass('active');
	// 	});
	// });
	// $('a').mouseup(function(event) {
	// 	$(this).removeClass('active');
	// });
});

function loadjscssfile(filename, filetype){
	if (filetype=="js"){
		var fileref=document.createElement('script')
		fileref.setAttribute("type","text/javascript")
		fileref.setAttribute("src", filename)
	}
	else if (filetype=="css"){
		var fileref=document.createElement("link")
		fileref.setAttribute("rel", "stylesheet")
		fileref.setAttribute("type", "text/css")
		fileref.setAttribute("href", filename)
	}
	if (typeof fileref!="undefined")
		document.getElementsByTagName("head")[0].appendChild(fileref)
}

function removejscssfile(filename, filetype){
	var targetelement=(filetype=="js")? "script" : (filetype=="css")? "link" : "none"
	var targetattr=(filetype=="js")? "src" : (filetype=="css")? "href" : "none"
	var allsuspects=document.getElementsByTagName(targetelement)
	for (var i=allsuspects.length; i>=0; i--){
	if (allsuspects[i] && allsuspects[i].getAttribute(targetattr)!=null && allsuspects[i].getAttribute(targetattr).indexOf(filename)!=-1)
	   allsuspects[i].parentNode.removeChild(allsuspects[i])
	}
}

function createjscssfile(filename, filetype){
	if (filetype=="js"){
		var fileref=document.createElement('script')
		fileref.setAttribute("type","text/javascript")
		fileref.setAttribute("src", filename)
	}
	else if (filetype=="css"){
		var fileref=document.createElement("link")
		fileref.setAttribute("rel", "stylesheet")
		fileref.setAttribute("type", "text/css")
		fileref.setAttribute("href", filename)
	}
	return fileref
}

function replacejscssfile(oldfilename, newfilename, filetype){
	var targetelement=(filetype=="js")? "script" : (filetype=="css")? "link" : "none"
	var targetattr=(filetype=="js")? "src" : (filetype=="css")? "href" : "none"
	var allsuspects=document.getElementsByTagName(targetelement)
	for (var i=allsuspects.length; i>=0; i--){
		if (allsuspects[i] && allsuspects[i].getAttribute(targetattr)!=null && allsuspects[i].getAttribute(targetattr).indexOf(oldfilename)!=-1){
		   var newelement=createjscssfile(newfilename, filetype)
		   allsuspects[i].parentNode.replaceChild(newelement, allsuspects[i])
		}
	}
}