$(function() {
    // Sidebar toggle behavior
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
    });
});

//verticalbar overflow scroll
$("#sidebar").mouseover(function(){$("#sidebar").css("overflow","scroll");});
$("#sidebar").mouseout(function(){$("#sidebar").css("overflow","hidden");});

// search to work when enter-key pressed
$(".search-field").keyup(function(event) {
    if (event.keyCode === 13) {
        $(".fa-search").click();
    }
});

// search clicked
function search(){
    var value = $(".search-field").val();
    window.location.replace('/?q='+value);
}
