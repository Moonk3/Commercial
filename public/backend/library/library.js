(function($){
    "use strict";
    var HT = {};
    var _token = $('meta[name = "csrf-token"]').attr('content');

    HT.switchery = () => {
        $('.js-switch').each(function(){
            var switchery = new Switchery(this,{color:'#1AB394'});
        })
    }

    // start/ 30/10/2024
    //Thành phố
    HT.select2 = () => {
        if($('.setupSelect2').length){
            $('.setupSelect2').select2();
        }
    }
    //end

    //start 3/11/2024 .status
    HT.changeStatus = () => {
        $(document).on('change', '.status', function(e){
            let _this = $(this)
            let option = {
                //'value' : _this.val(),
                'modelId' : _this.attr('data-modelId'),
                'model' : _this.attr('data-model'),
                'field' : _this.attr('data-field'),
                'value': _this.prop('checked') ? 0 : 1, //Khác
                '_token' : _token
            }

            $.ajax({
                url: 'ajax/dashboard/changeStatus', 
                type: 'POST', 
                data: option,
                dataType: 'json', 
                success: function(res) {
                    // let inputValue = ((option.value == 1)?2:1)
                    // if(res.flag == true){
                    //     _this.val(inputValue)
                    // }
                  console.log(res)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  
                  console.log('Lỗi: ' + textStatus + ' ' + errorThrown);
                }
            });

            e.preventDefault()
        })
    }
    //end
    $(document).ready(function(){
        HT.switchery();
        HT.select2();
        HT.changeStatus();
    });

})(jQuery);