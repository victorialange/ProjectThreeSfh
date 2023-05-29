// code to toggle side nav - by enabling sideNavActive class to unset display none css property
$(".burgerButton").on("click", (function() {
    $(".sideNavHidden").toggleClass("sideNavActive");
}))

// function to toggle update form
$(".updateButton").on("click", function() {
    $(this).siblings(".formHidden").toggleClass("formActive");
});
