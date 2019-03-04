/**
 * Created by user on 4/6/2017.
 */
$(document).ready(function () {

    $(document).on('click', '.media', (function () {
        var clickedbtn = $(this);
        $id = clickedbtn.attr('id');
        var modalContainer = $('#my-modal');
        modalContainer.modal({show: true});
        var insertBtn = modalContainer.find('#insert'), arr = [];
        insertBtn.click(function (event) {
            $c = $("input[name='add_img']:checked");
            // console.log($c);
            if ($c.val()) {
                insert($c, $id);
                $c.attr('checked', false);
                modalContainer.modal({show: false});
            }
        });
    }));

});
function insert(t, clickedbtn) {

    if (t.length === 1) {
        $('#' + clickedbtn).parent().siblings('.show').append('<img src="' + t.prev().attr('src') + '" alt="" class="file-preview-image">');
        $('#' + clickedbtn).parent().siblings('.form-group').find('[type=hidden]').val(t.prev().attr('src'));
        if(clickedbtn ==="training" )
        $('#' + clickedbtn).parent().siblings('.show').append('<input type="hidden" name="img_name" value="'+t.prev().attr('src')+'">' );
        else
            $('#' + clickedbtn).parent().siblings('.show').append('<input type="hidden" name="name[]" value="'+t.prev().attr('src')+'">' );
    } else if (t.length > 1) {
        for (var i = 0; i < t.length; ++i) {

                $('#' + clickedbtn).parent().siblings('.show').append('<img src="' + $('#'+t[i].id).prev().attr('src') + '" alt="" class="file-preview-image">');
                $('#' + clickedbtn).parent().siblings('.show').append('<input type="hidden" name="name[]" value="'+$('#'+t[i].id).prev().attr('src')+'">' );
            $('#' + clickedbtn).parent().siblings('.form-group').find('[type=hidden]').val($('#'+t[i].id).prev().attr('src'));

        }
    }


}
