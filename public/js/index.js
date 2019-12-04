$(function() {
    // Sidebar toggle behavior
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
    });
});

//verticalbar overflow scroll
$("#sidebar").mouseover(function(){$("#sidebar").css("overflow","scroll");});
$("#sidebar").mouseout(function(){$("#sidebar").css("overflow","hidden");});
