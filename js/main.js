$(document).ready(function(){
    var minh = $(window).height() - ($('.navbar').height() + $('footer').height());
    $('section').css('min-height', minh + 'px');
    }
);
// $('#submit-form').click(function (e){
//     e.preventDefault();
//     $('.form-group input').each(function () {
//         console.log($(this).val());
//     })
// });


$('#submit-form').click(function(e){
    let name = $('#name-form').val();
    let mail = $('#mail-form').val();
    let surname = $('#surname-form').val();
    let group = $('#groupSelect').val();
    let maisID = $('#maisID').val();
    console.log($('#name-form').val());
    if (name == '' || mail =='' || surname=='' || maisID==''){
        e.preventDefault();
        if (name == ''){
            $('#name-form').after('<span class="reg-alert">Field "name" is necessary</span>').css('border-color', '#cd0000');
        }
        if(mail == ''){
            $('#mail-form').after('<span class="reg-alert">Field "mail" is necessary</span>').css('border-color', '#cd0000');
        }
        if(surname == ''){
            $('#surname-form').after('<span class="reg-alert">Field "surname" is necessary</span>').css('border-color', '#cd0000');
        }
        if(maisID == ''){
            $('#maisID').after('<span class="reg-alert">Field "mais ID" is necessary</span>').css('border-color', '#cd0000');
        }
    }
});
