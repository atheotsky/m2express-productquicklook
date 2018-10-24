define(['jquery', 'ko', 'Magento_Ui/js/modal/modal', 'uiComponent', 'domReady!'], function($, ko, modal, Component) {
    'use strict';
    var self;
    return Component.extend({
        defaults: {
            justFun: 'Hello',
            template: 'M2express_ProductQuickLook/quicklook'
        },
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
                        self.pname(data.name);
                        self.price(data.price);
                        self.sku(data.sku);
                        for (var i=0; i < data.custom_attributes.length; i++) {
                            if (data.custom_attributes[i].attribute_code === "description") {
                                self.description(data.custom_attributes[i].value);
                            }
                        }

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