function AlertMessage(errorType, errorMessage, isHideAfter) {//  errorType => 'info', 'warning', 'success', 'error'

    var errorTypes = ['info', 'warning', 'success', 'error'];


    if (typeof (isHideAfter) !== 'boolean')
        isHideAfter = false;

    errorMessage = $.trim(errorMessage) || '';

    if (errorMessage != '') {

        if (jQuery.inArray(errorType.toString().toLowerCase(), errorTypes) != '-1') {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": 300,
                "hideDuration": 1500,
                "timeOut": 1000,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr[errorType](errorMessage);
        }
    }
}