$(document).ready(function () {
    $(document).on('change', '.ajax_request', function () {
        $dataVal = $(this).val();
        $url = $(this).attr('ajax_url'); 
        var callBackName = $(this).attr('data-callBackName');
        // console.log(callBackName);
        function ajax_requests(data, url) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: $url,
                dataType: "json",
                data: {
                    data: data
                },
                success: function (response) { 
                    window[callBackName](response);
                }
            });
        }
        ajax_requests($dataVal, $url);

    });
});
 

$('.print_button').click(function(){
    window.print();
    return false;
});