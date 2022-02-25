/*function yesnoCheck(that) {
    if (that.value == "other") {
  alert("check");
        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}*/
function yesnoCheck(that) {
    if (that.value == "dvd-disk") {
  //alert("check");
        document.getElementById("ifYesdisk").style.display = "block";
    } else {
        document.getElementById("ifYesdisk").style.display = "none";
    }
	
	
	if (that.value == "book") {
  //alert("check");
        document.getElementById("ifYesbook").style.display = "block";
    } else {
        document.getElementById("ifYesbook").style.display = "none";
    }
	
	if (that.value == "furniture") {
  //alert("check");
        document.getElementById("ifYesfurniture").style.display = "block";
    } else {
        document.getElementById("ifYesfurniture").style.display = "none";
    }
}
//by click add -->get add form on the same page
$(document).ready(function(){
$('#Mybtn').click(function(){
$('#MyForm').toggle(500);
});
});
