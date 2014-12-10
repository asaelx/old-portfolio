$(function(){

    var body = $('body'),
        base_url = $('base').attr('href');

    /* Console log */
    function con(x){
        console.log(x);
    }

    /* Autosize Textarea */
    $('.textarea').autosize();

    /* File */

    $('.file').change(function(){
        var input = this,
            file_preview = $(input).parent().children('.file_preview'),
            image_type = /image.*/;
        if (input.files && input.files[0]) {
            var file = input.files[0],
                reader = new FileReader();

            if(file.type.match(image_type)){
                reader.onload = function (e) {
                    var img = $('<img>', {
                            src: e.target.result,
                            class: 'img'
                        });
                    file_preview.html(img);
                }

                reader.readAsDataURL(input.files[0]);
            }else{
                var error = $('<p>', {
                        text: 'Dude, it should be and image',
                        class: 'error'
                    });
                file_preview.html(error);
            }
        }
    });


});