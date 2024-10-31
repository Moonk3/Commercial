(function($){
    "use strict";
    var HT = {};
    var document = $(document)

    HT.switchery = () => {
        $('.js-switch').each(function(){
            var switchery = new Switchery(this,{color:'#1AB394'});
        })
    }

    // start/ 30/10/2024
    //Thành phố
    HT.select2 = () => {
        $('.setupSelect2').select2();
    }
    //end

    document.ready(function(){
        HT.switchery();
        HT.select2();
    });

})(jQuery);