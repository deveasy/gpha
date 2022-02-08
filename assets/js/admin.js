$(document).ready(function(){


        var inc = 1;

//ctrlKey, shiftKey, altKey

    function success_message(message){
        var html = '<div class="alert alert-success" role="alert" id="pro-update-success"><strong>' + message + '</strong></div>';
        return html;
    }

    // function goBack(){
    //     window.history.back();
    // }

    $("button.back-button").on("click", function(e){
        e.preventDefault();
        window.history.back();
    });
    
    $(function(){
        $("#btn").click(function(event){
            $.ajax({
                url: base_url + "index.php/inventory",
                type: "GET",
                dataType: "text",
                success: "something goes here. can be a function",
                error: "error message goes here. can be a function too",
                complete: "to display when successful or not"
            });
        });
    });
    
    // $("#sub").click(function(){
    // 	var sum = 0;
    //     $("#waybill").prepend("<tr><td>20</td><td>Mama's Pride</td><td>143.00</td><td class=\"amount\">2860.00</td></tr>");
    //     $(".amount").each(function(){
    //     	sum += Number($(this).text());
    //     });
    //     $("#totalAmount").text(sum);
    // });

    //add products to transfer list
    $(document).on("click","button", function(){
    	var currentId = (this.id);
    	var quantity = Number($("#"+currentId+"qty").val());
    	var name = $("#"+currentId+"name").attr('data-id');
    	var current_level = Number($("#" + currentId + "_level").attr('data-id'));
    	var nName = "name" + currentId;
    	var qName = "qty" + currentId;

    	if(current_level < quantity){
            $("#" + currentId  + "name").prepend("<p id=\"product_level\" class=\"text-danger\">You have only " + current_level + " available. </p>");
            $("#"+currentId+"qty").focus();
        }
        else if(quantity == ''){
    	    $("#"+currentId+"qty").focus();
            $("#"+currentId+"qty").addClass('has-error');
        }
        else{
            $("#transferDetails").append("<div><input type=\"hidden\" name=\""+currentId+"\" value=\""+quantity+"\"></div>");

            $("#waybill").prepend("<tr><td>"+quantity+"</td><td>"+name+"</td></tr>");

            $("#"+currentId+"qty").val("");
            $("#"+currentId+"name").text(name);

            current_level -= quantity;
            $("#" + currentId + "_level").attr('data-id', current_level);
        }
    });

    //fade out error notification for
    //current product level above
    setTimeout(function(){
        $("#product_level").fadeOut('fast');
    }, 2000);

    //add product to transfer list
    //when Enter Key is pressed
    $(document).on("keypress","input", function(e){
        var key = e.which;
        if(key == 13){
            var currentId = $(this).closest('button').click();
            var quantity = $(this).val();
            var name = $("#"+currentId+"name").text();
            var nName = "name"+currentId;
            var qName = "qty"+currentId;

            $("#waybill").prepend("<tr><td>"+quantity+"</td><td>"+name+"</td></tr>");

            $("#transferDetails").append("<div><input type=\"hidden\" name=\""+currentId+"\" value=\""+quantity+"\"></div>");
            $("#"+currentId+"qty").val("");
        }
    });

    //delete main transfer items from all transfers list
    $(".delete-transfer").click(function () {
        var main_id = $(this).closest('tr').attr('id');
        if(confirm("Are you sure you want to delete this item?")){
            $.ajax({
                url: base_url + 'index.php/inventory/delete_transfer/'+ main_id,
                type: 'DELETE',
                success: function (){
                    $("#"+main_id).remove();
                    return false;
                }
            });
        }
        else{
            location.reload();
        }
    });

    //delete transfer detail from view transfer list
    $(".delete-item").click(function(){
        var id = $(this).closest('tr').attr('id');
        if(confirm("Are you sure you want to delete this item?")){
            $.ajax({
                url: base_url + 'index.php/inventory/delete_transfer_detail/'+ id,
                type: 'DELETE',
                success: function () {
                    $("#"+id).remove();
                    return false;
                }
            });
        }
        else{
            location.reload();
        }
    });

    $(".delete-order-item").click(function () {
        var id = $(this).closest('tr').attr('id');
        var warehouse = $("#warehouse").attr('data-id');
        if(confirm("Are you sure you want to delete this item?")){
            $.ajax({
                url: base_url + 'index.php/inventory/delete_warehouse_order_detail/'+ id + '/'+ warehouse,
                type: 'DELETE',
                success: function(){
                    $("#"+id).remove();
                    return false;
                }
            });
        }
        else {
            location.reload();
        }
    })

    //function to validate and submit transfer products form
    $("#transferBtn").click(function(){
        if($("#source").val() == ""){
            $("#sourceDiv").addClass("has-error");
            $("#source").focus();
        }
        if($("#destination").val() == ""){
            $("#destinationDiv").addClass("has-error");
            $("#destination").focus();
        }
        else{
            $("#transferFrm").submit();
        }
    });

    //validate sales order form from warehouse
    $("#orderBtn").click(function(){
        if($("#customerName").val() == ""){
            $("#customerDiv").addClass("has-error");
            $("#customerName").focus();
        }
        else{
            $("#orderFrm").submit();
        }
    });

    //function to submit receive stock form
    $("#receiveStockBtn").click(function(){
        if($("#warehouse").val() == ""){
            $("#warehouseDiv").addClass("has-error");
            $("#warehouse").focus();
        }
        else{
            $("#receiveStockFrm").submit();
        }
    })

    //function to make product row clickable
    $("tr.trans").click(function(){
    	window.location = $(this).find("a").attr("href");
    }).hover(function(){
    	$(this).toggleClass("transfer-hover");
    });

    //timeout function for product update notification
    setTimeout(function(){
        $("#pro-update-success").fadeOut('fast');
    }, 2000);
    
    //function to delete row from table lists
    $(document).on("click", "a.delete", function(){
        $(this).closest('tr').remove();
        return false;
    });

    //reset the product level to zero on the update warehouse stock page
    $(document).on("click", "button.reset", function(){
        var product_code = $(this).closest('tr').attr('id');
        var warehouse = $('.warehouse').attr('id');
        $.ajax({
            url: base_url + 'index.php/inventory/reset_warehouse_product_level/' + product_code + '/' + warehouse,
            type: 'POST',
            success: function () {
                $("#"+product_code+"_level").text(0);
                return false;
            }
        });
    });

    $(".delete-staff").click(function () {
        var staff_id = $(this).closest('tr').attr('id');
        if(confirm("Are you sure you want to delete this staff?")){
            $.ajax({
                url: base_url + 'index.php/staff/delete_staff/'+staff_id,
                type: 'DELETE',
                success: function(){
                    $("#"+staff_id).remove();
                    return false;
                }
            });
        }
        else{
            location.reload();
        }
    });

    $(".delete-restock").click(function () {
        var restock_id = $(this).closest('tr').attr('id');
        if(confirm("Are you sure you want to delete this invoice")){
            $.ajax({
                url: base_url + 'index.php/inventory/delete_restock/' + restock_id,
                type: 'DELETE',
                success: function(){
                    var message = 'You have successfully deleted restock order.';
                    $("#"+restock_id).remove();
                    $("#success-message").html(success_message(message)).fadeOut();
                    setTimeout(function () {
                        $("success-message").fadeOut('fast');
                    }, 20000);
                    return false;
                }
            })
        }
        else{
            location.reload();
        }
    });

    $(".delete-restock-item").click(function(){
        var id = $(this).closest('tr').attr('id');
        if(confirm("Are you sure you want to delete this item?")){
            $.ajax({
                url: base_url + 'index.php/inventory/delete_restock_detail/' + id,
                type: 'DELETE',
                success: function(){
                    $("#"+id).remove();
                    return false;
                }
            })
        }
    })

    //import button on products page
    $("#import-button").click(function(){
        $("#select-file").click();
    });

    $("#select-file").change(function () {
        $("#import-form").submit();
    });

    //function to add a new row in stock receipt table
    $("input").keypress(function(e){
        if(e.ctrlKey){
            alert('has been pressed.');
        };
    });

    //function to add prescription detail on new prescription page
    $("#add-prescription").click(function () {
        //alert("Are you sure about this you're doing?");

        var medicine = $("#medicine").val();
        var dosage = $("#dosage").val();

        $("#prescription").append("<div><input type=\"hidden\" name=\"" + inc + "\" value=\"" + medicine + "\"></div>");
        $("#prescription").append("<div><input type=\"hidden\" name=\"dosage" + inc + "\" value=\"" + dosage + "\"></div>");

        $("#prescription").append("<p><strong>" + inc + ". " + medicine + "</strong></p>");
        $("#prescription").append("<p>" + dosage + "</p>");

        inc = inc + 1;
    });
});