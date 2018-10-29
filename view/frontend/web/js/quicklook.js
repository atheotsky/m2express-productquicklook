define(['jquery', 'ko', 'Magento_Ui/js/modal/modal', 'uiComponent', 'domReady!'], function($, ko, modal, Component) {
    'use strict';
    var self;
    return Component.extend({
        defaults: {
            justFun: 'Hello',
            template: 'M2express_ProductQuickLook/quicklook'
        },
        productImgList : ko.observableArray([]),
        imagePath : ko.observable(''),
        pname : ko.observable(''),
        price : ko.observable(''),
        sku : ko.observable(''),
        description : ko.observable(''),
        initObservable: function () {
            self = this;
            this._super();
            return this;
        },
        openQuickLookModal:function (productId) {
            $.ajax(
                {
                    type:'GET',
                    url:'/rest/V1/get-product-details/pid/' + productId,
                    data: null,
                    dataType: 'json',
                    success: function(data){
                        var returnData = jQuery.parseJSON(data);
                        console.log(returnData);
                        self.pname(returnData.response.name);
                        self.price(returnData.response.price);
                        self.sku(returnData.response.sku);
                        self.description(returnData.response.description);
                        var productImages = [];
                        $.each(returnData.gallery, function(index) {
                            productImages.push({ data: returnData.gallery[index]['small_image_url']});
                        });

                        self.productImgList(productImages);

                        var options = {
                            type: 'popup',
                            responsive: true,
                            innerScroll: false,
                            title: false,
                            buttons: false
                        };

                        var modal_overlay_element = $('#quicklook-modal');

                        var popup = modal(options, modal_overlay_element);

                        modal_overlay_element.css("display", "block");

                        var modalContainer = $("#quicklook-modal");
                        modalContainer.modal('openModal');
                    }
                }
            );
        }
    });
});