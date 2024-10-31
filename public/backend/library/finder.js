(function($){
    "use strict";
    var HT = {};
    var document = $(document)

    HT.inputImage = () => {
        $(document).on('click','.input-image',function(){
            let _this = $(this)
            let fileUpload = _this.attr('data-upload')
            HT.browseServerAvatar($(this),fileUpload);
        })
    }

    HT.browseServerAvatar = (object, type) => {
        if(typeof(type) == 'undefined'){
            type = 'Images';
        }
        var finder = new CKFinder();
        finder.resourceType = type;
        finder.selectActionFunction = function( fileUrl, data ) {
            object.find('img').attr('src', fileUrl)
            object.siblings('input').val(fileUrl)
        }
        finder.popup();
    }

    document.ready(function(){
        HT.BrowseServerInput();
    });

})(jQuery);