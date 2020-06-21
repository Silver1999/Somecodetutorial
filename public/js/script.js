$('.imageUp').change(function(){
    var imgUrl = URL.createObjectURL(event.target.files[0]);
    var ext = $(this).val().replace(/^.*\./, '').toLowerCase();
    var title = $(this).val().split('\\').pop();

    $('.photo-picker').addClass('open');

    if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
        alert('Only Image can be Upload!');
    }
    else{
        $('.photo-title').text(title);
        $('.preview').attr('src', imgUrl);
    }
})
$('.imageUp').click(function(){
    $('.photo-picker').removeClass('open');
});
