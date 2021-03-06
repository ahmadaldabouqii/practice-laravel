$('.show-alert-delete-box').click(function(event) {
    const form = $(this).closest("form");
    const name = $(this).data("name");
    event.preventDefault();
    return swal({
        title: `Are you sure you want to delete this ${name}?`,
        type: "warning",
        confirmButtonColor: "#ee0707",
        confirmButtonClass: "warning",
        icon: "warning",
        buttons: ["Cancel", "Yes!"],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            form.submit();
        }
    });
});
