$(function () {
    var form = $('#form-shipping');

    // Логика поля Фиксированная стоимость оплаты
    var orderPaymentMarkupField   = form.find('input[name="shipping_dvbusiness_dostavista_payment_markup_amount"]');
    var orderPaymentDiscountField = form.find('input[name="shipping_dvbusiness_dostavista_payment_discount_amount"]');
    var fixOrderPaymentField      = form.find('input[name="shipping_dvbusiness_fix_order_payment_amount"]');

    function fixOrderPaymentProcessor() {
        orderPaymentMarkupField.prop('disabled', fixOrderPaymentField.val().trim() > 0);
        orderPaymentDiscountField.prop('disabled', fixOrderPaymentField.val().trim() > 0);
    }

    fixOrderPaymentField.change(function () {
        fixOrderPaymentProcessor();
    });

    fixOrderPaymentField.keydown(function () {
        fixOrderPaymentProcessor();
    });

    fixOrderPaymentProcessor();

    // Смена АPI сервера
    form.find('select[name="shipping_dvbusiness_is_api_test_server"]').on('change', function () {
        var authTokenInput = form.find('input[name="shipping_dvbusiness_auth_token"]:first');
        authTokenInput.val(
            $(this).val() == 1 ? authTokenInput.data('token-test') : authTokenInput.data('token-prod')
        );
    });
});