function check_all()
{
    //item_checkbox
    $('input[class="item_checkbox"]:checkbox').each(function () {
    
        if ($('input[class="check_all"]:checkbox:checked').length == 0) 
        {
            $(this).prop('checked',false);
        }else{
            $(this).prop('checked',true);
        }
    });
}

function delete_all() 
{
    $(document).on('click','.del_all',function () {

        $('#form_data').submit();
    });
    $(document).on('click','.delBtn',function () {
        var item_checked = $('input[class="item_checkbox"]:checkbox').filter(":checked").length;
        if (item_checked > 0 ) 
        {
            $('.record-count').text(item_checked);
            $('.not-empty-record').removeClass('hidden');
            $('.empty-record').addClass('hidden');
        }else{
            $('.record-count').text('');
            $('.not-empty-record').addClass('hidden');
            $('.empty-record').removeClass('hidden');
        }
        $('#mutliplrDelete').modal('show');
    });
}
