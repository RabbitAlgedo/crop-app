$(document).ready(function (){
    $('input[type=radio][name=user_for]').change(function (){
        if($(this).val() === 'SELLER') {
            $('#name_by_user').text('Назва юр. особи');

            $('#user_type_processor').attr("disabled",true);
            $('.user_type_processor').hide();

            $('#user_type_producer').attr("disabled",false);
            $('.user_type_producer').show();
        } else {
            $('#name_by_user').text('Назва');

            // $('.user_type_processor').removeClass('d-none');

            $('#user_type_producer').attr("disabled",true);
            $('.user_type_producer').hide();

            $('#user_type_processor').attr("disabled",false);
            $('.user_type_processor').removeClass('d-none').show();
        }
    });
});
