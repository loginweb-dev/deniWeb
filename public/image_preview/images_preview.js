$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            $('#img-preview').html(``);

            $(` <button type="button" title="Agregar imagen(es)" onclick="add_img()" class="btn btn-primary" style="padding:5px 20px;font-size:50px">
                    <span class="voyager-plus"></span>
                </button>`).appendTo(placeToInsertImagePreview);

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $(`
                        <img src="${event.target.result}" style="height:100px" class="img-thumbnail img-sm img-gallery">
                    `).appendTo(placeToInsertImagePreview)
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, $('#img-preview'));
    });
});

function add_img(){
    $('#gallery-photo-add').trigger('click');
}
