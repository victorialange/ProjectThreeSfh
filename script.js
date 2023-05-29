// code to toggle side nav - by enabling sideNavActive class to unset display none css property
$(".burgerButton").on("click", (function() {
    $(".sideNavHidden").toggleClass("sideNavActive");
}))

// function to toggle update form
$(".updateButton").on("click", function() {
    $(this).siblings(".formHidden").toggleClass("formActive");
});

// function to confirm deletion of adventure
function confirmDelete() {
    return confirm("Are you sure you want to delete this adventure?");
}