$(function () {

    // var x = 0, xx = 0;
    $('.add_ed').click(function () {
        add_block($(this));
    });
    $('.add_ex').click(function () {
        add_block($(this));
    });
    function add_block(t) {
        var max_fields = 10, content, content_clone;
        content = t.nextAll('.form_item:last-child');
        x = t.nextAll('.form_item:last-child').attr('id').split('_')[1];
        if (x < max_fields) {
            x++;
            content_clone = content.clone();
            content_clone.each(function () {
                var id = $(this).attr('id').split('_')[0].split('-')[0] + "_" + x;
                $(this).attr('id', id);

                $(this).find('div').each(function () {
                    $class = $(this).attr('class');

                    $class = $class.split(' ')[1];
                    if ($class) {
                        $(this).attr('class', 'form-group ' + $class.replace(x - 1, x));
                    }
                });

                $media = $(this).find('.media');
                $(this).find(".show").empty();
                $m_id = $media.attr('id').split("_");
                $media.attr('id', $m_id[0] + "_" +$m_id[1] +"_" + x);

                $(this).find('label').each(function () {

                    $(this).attr('for', $(this).attr('for').replace(x - 1, x));
                });
                $(this).find('input').each(function () {

                        $(this).attr('name', $(this).attr('name').replace(x - 1, x)).attr('id', $(this).attr('id').replace(x - 1, x));

                });
                $(this).find('.remove_fields').css('display', 'block');
            });
            content_clone.appendTo(t.parent());
        }
    }

    $(document).on("click", ".remove_fields, .delete_inserted", function (e) {
        //user click on remove text
        e.preventDefault();
        $(this).parent().empty();

    });



});



