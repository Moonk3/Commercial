(function($){
    "use strict";
    var HT = {};

    // start/ 30/10/2024
    //Quận huyện
    HT.getLocation = () => {
        $(document).on('change','.location',function(){ 
            let _this = $(this)
            let option = {
                'data' :{
                    'location_id' : _this.val(),
                },
                'target' : _this.attr('data-target')
            }
            HT.sendDataTogetLocation(option)
        })
    }
    //end

    HT.sendDataTogetLocation = (option) =>{
        $.ajax({
            url: 'ajax/location/getLocation',
            type: 'GET',
            data: option,
            dataType: 'json',
            success: function(res){
                console.log(res)
                $('.'+option.target).html(res.html);
            },
            error: function(jqXHR,textStatus, errorThrown){
                console.log('Lỗi: ' + textStatus + ' ' + errorThrown);
            }
        });
    }


    $(document).ready(function(){
        HT.getLocation();
    });

})(jQuery);