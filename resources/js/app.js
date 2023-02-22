import './admin/lib/jquery.min';
import './bootstrap';
// import ClipboardJS from 'clipboard';

import './admin/lib/jquery.validate.min';
import './admin/lib/additional-methods.min';

import './admin/lib/bootstrap';
import './admin/lib/summernote-bs4.min';
import './admin/lib/select2.full.min';
import './admin/lib/toastr.min';
import './admin/lib/lazyload';

// import './admin/lib/sharect';
// import './admin/lib/darkmode.min';
// import './admin/lib/tocbot.min';
import tippy from 'tippy.js';

//codemirror
import './admin/lib/codemirror';
import './admin/keymap/sublime';
import './admin/lib/css';
import './admin/lib/xml';
import './admin/mode/htmlmixed/htmlmixed';
import './admin/mode/clike/clike';
import './admin/mode/cmake/cmake';
import './admin/mode/cobol/cobol';
import './admin/mode/php/php';
import './admin/mode/javascript/javascript';
//codemirror

import './admin/index';
import './admin/lib/adminlte';
import './admin/use/validate';
import './admin/use/function';
// import './admin/demo';

// $('.copy').each(function(index, value) {
//     $(this).on("click" ,function () {
//         $("[data-copy]").each(function(key, data) {
//             if(index == key){
//                 const textCopied = ClipboardJS.copy($(this).text());
//                 console.log(textCopied);
//                 toastr.success("Đã copy thành công", "", {"closeButton": true})
//             }
//         })
//     })
// })

tippy('[data-tippy-content]');


// Echo.channel('caoson')
//     .listen('LockAccUser', (e) => {
//         console.log(e);
//     })

