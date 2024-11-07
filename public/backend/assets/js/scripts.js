// delete the selected row
$('.show_confirm').click(function (event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal.fire({
        title: 'دڵنیای کە دەتەوێت ئەم داتایە بسڕیتەوە؟',
        text: "!ناتوانیت ئەم داتایە بگەڕێنیتەوە",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "بەڵی، بیسڕەوە",
        cancelButtonText: "پاشگەزبوونەوە",
        })
        .then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
});

// end of delete the selected row

var toggler = document.querySelectorAll('.form-password-toggle i');
if (typeof toggler !== 'undefined' && toggler !== null) { 
    toggler.forEach(function (el) { 
        el.addEventListener('click', function (e) {
            e.preventDefault();
            var formPasswordToggle = el.closest('.form-password-toggle');
            var formPasswordToggleIcon = formPasswordToggle.querySelector('i');
            var formPasswordToggleInput = formPasswordToggle.querySelector('input');
            if (formPasswordToggleInput.getAttribute('type') === 'text') {
                formPasswordToggleInput.setAttribute('type', 'password');
                formPasswordToggleIcon.classList.replace('bx-show', 'bx-hide');
            } 
            else if (formPasswordToggleInput.getAttribute('type') === 'password') {
                formPasswordToggleInput.setAttribute('type', 'text');
                formPasswordToggleIcon.classList.replace('bx-hide', 'bx-show');
            }
        });
    });
}


