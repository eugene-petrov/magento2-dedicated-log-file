define([
    'uiComponent',
    'jquery'
], function (component, $) {
    'use strict';

    return component.extend({
        defaults: {
            elements: {
                textForLog: "#snippet-dedicated-log"
            },
            ajaxUrl: ""
        },

        writeLog: function () {
            let text = $(this.elements.textForLog).val();

            if (!text) {
                return;
            }

            $(this.elements.textForLog).val('');

            $.ajax({
                showLoader: true,
                url: this.ajaxUrl,
                data: {
                    text: text,
                    form_key: $.cookie('form_key')
                },
                type: 'post',
                dataType: 'json'
            }).done(function (data) {
                console.log('done');
            });
        }
    });
});
