/*!
 * Start Bootstrap - SB Admin 2 v3.3.7+1 (http://startbootstrap.com/template-overviews/sb-admin-2)
 * Copyright 2013-2016 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap/blob/gh-pages/LICENSE)
 */
$(function() {
    $('#side-menu').metisMenu();
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    // var element = $('ul.nav a').filter(function() {
    //     return this.href == url;
    // }).addClass('active').parent().parent().addClass('in').parent();
    var element = $('ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent();

    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }
});


//sets datatable functionalities to tables
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });

    $('#faulty-table').DataTable({
        responsive: true
    });

    $('#assigned-table').DataTable({
        responsive: true
    });

    $('#unassigned-table').DataTable({
        responsive: true
    });

    $('#assets-table').DataTable({
        responsive: true
    });

    $('#discarded-table').DataTable({
        responsive: true
    });

    $('#all-table').DataTable({
        responsive: true
    });

    $("#addAsset").click(function(){
        alert("Hello world");
    });
});


$(document).ready(function(){
    // Autocomplete product search on new sale page 
    $( "#lanMac" ).autocomplete({
        source: function( request, response ){
            // Fetch data
            $.ajax({
                url: 'http://localhost/gpha/index.php/assets/search',
                type: 'post',
                dataType: "json",
                data: {
                search: request.term
                },
                success: function( data ) {
                    response( data );
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#lanMac').val(ui.item.label); // display the selected text
            $('#wireless_mac').val(ui.item.value); // save selected id to input
            return false;
        }
    });
});


