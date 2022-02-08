$(document).ready(function(){

    $(document).on("click","button", function(){
    	var currentId = (this.id);
    	var quantity = $("#"+currentId+"qty").val();
    	var name = $("#"+currentId+"name").text();
    	var nName = "name"+currentId;
    	var qName = "qty"+currentId;

    	$("#waybill").prepend("<tr><td>"+quantity+"</td><td>"+name+"</td></tr>");

    	$("#transferDetails").append("<div><input type=\"hidden\" name=\""+currentId+"\" value=\""+quantity+"\"></div>");
    	$("#"+currentId+"qty").val("");
    });

    $("tr.trans").click(function(){
    	window.location = $(this).find("a").attr("href");
    }).hover(function(){
    	$(this).toggleClass("transfer-hover");
    });

    setTimeout(function(){
        $("#pro-update-success").fadeOut('fast');
    }, 2000);
});