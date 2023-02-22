
function alertDone(title, content) {
    Swal.fire({
        title: title,
        html: '<b>' + content + '<b>',
        timer: 3000,
        timerProgressBar: true,
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: true,
    })
}

function delete_success(message) {
    Swal.fire(
        'Deleted!',
        message,
        'success'
    )
}

function delete_swal_fails(message) {
    Swal.fire(
        'Deleted!',
        message,
        'error'
    )
}

// show toastr
var success = document.querySelectorAll('.alert-success');
for (let i = 0; i < success.length; i++) {
    toastr.success(success[i].innerHTML, "", { "closeButton": true })
}

var danger = document.querySelectorAll('.alert-error');
for (let i = 0; i < danger.length; i++) {
    toastr.error(danger[i].innerHTML, "", { "closeButton": true })
}

var infor = document.querySelectorAll('.alert-infor');
for (let i = 0; i < infor.length; i++) {
    toastr.infor(infor[i].innerHTML, "", { "closeButton": true })
}

var warning = document.querySelectorAll('.alert-warning');
for (let i = 0; i < warning.length; i++) {
    toastr.warning(warning[i].innerHTML, "", { "closeButton": true })
}

var message = document.querySelectorAll('.alert-message');
for (let i = 0; i < message.length; i++) {
    alertDone("Thông báo", message[i].innerHTML)
}

var delete_swal = document.querySelectorAll('.alert-delete-success');
for (let i = 0; i < delete_swal.length; i++) {
    delete_success(delete_swal[i].innerHTML);
}

var delete_swal_fail = document.querySelectorAll('.alert-delete-fail');
for (let i = 0; i < delete_swal_fail.length; i++) {
    delete_swal_fails(delete_swal_fail[i].innerHTML);
}

var error = document.querySelectorAll('.error');
for (let i = 0; i < error.length; i++) {
    toastr.success(error[i].innerHTML, "", { "closeButton": true })
}
//---------------------------------------------------------------------------

$(document).on("click", ".delete", function (e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "Bạn chắc chắn muốn xóa lựa chọn này chứ ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, xóa nó!',
        cancelButtonText: 'Hủy',
    }).then((result) => {
        if (result.value) {
            $(this).submit();
        }
    })
});

function addDarkmodeWidget() {
    const options = {
        time: '0.5s', // default: '0.3s'
        mixColor: '#fff', // default: '#fff'
        backgroundColor: '#fff',  // default: '#fff'
        buttonColorDark: '#100f2c',  // default: '#100f2c'
        buttonColorLight: '#fff', // default: '#fff'
        saveInCookies: true, // default: true,
        label: '🌓', // default: ''
        autoMatchOsTheme: true // default: true
    }

    const darkmode = new Darkmode(options);
    darkmode.showWidget();
}

var url = window.location;
var arr = url.toString().split('/');
if (!arr.includes("admin")) {
    window.addEventListener('load', addDarkmodeWidget);
}

$('[data-toggle="tooltip"]').tooltip();
// var clipboard = new Clipboard('.class_name_of_the_div');
//   clipboard.on('success', function (event) {});
//   clipboard.on('error', function (evwnt) {});

// data-clipboard-text={data.text}