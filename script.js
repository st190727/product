function yesnoCheck(that) {
    if (that.value == "dvd-disk") {

        document.getElementById("ifYesdisk").style.display = "block";
    } else {
        document.getElementById("ifYesdisk").style.display = "none";
    }
	
	
	if (that.value == "book") {

        document.getElementById("ifYesbook").style.display = "block";
    } else {
        document.getElementById("ifYesbook").style.display = "none";
    }
	
	if (that.value == "furniture") {

        document.getElementById("ifYesfurniture").style.display = "block";
    } else {
        document.getElementById("ifYesfurniture").style.display = "none";
    }
}

$(document).ready(function(){
	$('#Mybtn').click(function(){
	$('#MyForm').toggle(500);
	});
});
