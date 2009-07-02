//Controls the text inside the search box onblur and onfocus
function searchblur(element) {
	if(element.value == '') {
		element.value = 'To search, type and hit enter...';
	}
}
function searchfocus(element) {
	if(element.value == 'To search, type and hit enter...') {
		element.value = '';
	}
}

//Controls RSS and Email subsribe link tooltips
function showRSS() {
	document.getElementById('feedbubble').style.left='13px';
}
function hideRSS() {
	document.getElementById('feedbubble').style.left='-999px';
}
function showEmail() {
	document.getElementById('emailbubble').style.left='13px';
}
function hideEmail() {
	document.getElementById('emailbubble').style.left='-999px';
}

//Show or hide elements
function hideTags() {
	if(document.getElementById('allowedtagstxt')) {
		if(document.getElementById('allowedtagstxt').style.display == 'none') {
			document.getElementById('allowedtagstxt').style.display = 'block';
		}else{
			document.getElementById('allowedtagstxt').style.display = 'none';
		}
	}//endif
} //end hide function

//Show or hide archive excerpts
function toggleExcerpt(id) {
	var id;
	if(document.getElementById(id)) {
		if(document.getElementById(id).style.display == 'none') {
			document.getElementById(id).style.display = 'block';
		}else{
			document.getElementById(id).style.display = 'none';
		} //endif
	} //endif
} //end function

//Hide archive excerpts on page load and "hide excerpts" link
function hideElement(element1, element2, element3, element4) {
	var element1;
	var element2;
	var element3;
	if(document.getElementById(element1)) {
		document.getElementById(element1).style.display = 'none';
	}//endif
	if(document.getElementById(element2)) {
		document.getElementById(element2).style.display = 'none';
	} //endif
	if(document.getElementById(element3)) {
		document.getElementById(element3).style.display = 'none';
	}//endif
	if(document.getElementById(element4)) {
		document.getElementById(element4).style.display = 'none';
	}//endif
} //end function

function hideAll(baseId1, Id4, Id5) {
	var baseId1; var Id4; var Id5;
	var counter = 0;
	while(document.getElementById(baseId1 + counter)) {
		document.getElementById(baseId1 + counter).style.display = 'none';
		counter++;
	} //endwhile
	document.getElementById(Id4).style.display = 'none';
	document.getElementById(Id5).style.display = 'inline';
} //end function
function showAll(baseId1, Id4, Id5) {
	var baseId1; var Id4; var Id5;
	var counter = 0;
	while(document.getElementById(baseId1 + counter)) {
		document.getElementById(baseId1 + counter).style.display = 'inline';
		counter++;
	}//endwhile
	document.getElementById(Id4).style.display = 'none';
	document.getElementById(Id5).style.display = 'inline';
}//end function

function toggleSwap(turnOn, turnOff, turnOff1, turnOff2) {
	var turnOn; var turnOff; var turnOff1; var turnOff2;
	if(document.getElementById(turnOn)) {
		document.getElementById(turnOn).style.display = 'block';
	}
	if(document.getElementById(turnOff)) {
		document.getElementById(turnOff).style.display = 'none';
	}
	if(document.getElementById(turnOff1)) {
		document.getElementById(turnOff1).style.display = 'none';
	}
	if(document.getElementById(turnOff2)) {
		document.getElementById(turnOff2).style.display = 'none';
	}
} //end function