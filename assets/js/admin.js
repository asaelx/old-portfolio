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
            $this = $(input),
            file_preview = $(input).parent().children('.file_preview'),
            image_type = /image.*/;
        if (input.files && input.files[0]) {
            var file = input.files[0],
                reader = new FileReader();

            if($this.hasClass('bg')){
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
            }else if($this.hasClass('item')){
                //Image
                if(file.type.match(image_type)){
                    var uploadItem = base_url + '/admin/uploadItem',
                        data = new FormData(),
                        textarea = $('.article_content');

                    data.append('item', file);

                    $.ajax({
                        url: uploadItem,
                        type: 'POST',
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        cache: false,
                        'data': data,
                        success: function(response){
                            var url = base_url + '/uploads/originals/' + response.url;
                            var img = $('<img>', {
                                    src: url,
                                    alt: response.title,
                                    class: 'img'
                                }),
                                item = $('<li>', {
                                    class: 'item',
                                    html: img
                                }),
                                uploads = file_preview.children('.uploads');
                            uploads.append(item);
                            textarea.val(textarea.val() + '!['+ response.title +']('+ url +')');
                        }
                    });
                }else{
                    var error = $('<p>', {
                            text: 'Dude, it should be and image',
                            class: 'error'
                        });
                    file_preview.html(error);
                }
            }
        }
    });


});