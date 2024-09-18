//Lookup customer receipts modal js 
function customer_receipts_callback(data){ // Preview button callback
    if (data.status == true) {
        var url = "/customer-receipts?show="+data.r_id;
        window.location.replace(url);
    } else {
        notify('error', data.message, 'Receipts Error');
        $.validator("customer_receipts_popup", data.errors);
    }
}

//Customer ledger report modal js 
function ledger_popup_change_project_callback(data){
    $('#CLRPunit_no').html('<option value="" selected>--Select Unit--</option>'+data.units);
}

function customer_ledger_report(data){ 
    $('#CLRPunit_no2').html('<option value="" selected>--Select Unit--</option>'+data.units);
}

function accounts_ledger_callBack(data){ 
    window.open('/accounts-ledger-view', '_blank'); 
}

function customer_ledger_callBack(data){ 
    window.open('/customer-ledger-view', '_blank'); 
}

function cash_book_callBack(data){
    window.open('/cash-book', '_blank'); 
}


function recovery_ledger_callBack(data){ 
    if(data.status){
        window.open(data.url, '_blank'); 
    }
    else{
        notify('error', data.message, 'Recovery Form');
        $.validator("recovery_ledger_form", data.errors);
    }
}

function installment_report_callBack(data){ 
    if (data.status == true) { 
        window.open(data.url, '_blank'); 
    } else {
        notify('error', data.message, 'Error');
        $.validator("installment_report_form", data.errors);
    }
}


function balance_sheet_callBack(data){
    if(data.status){
        window.open(data.url, '_blank'); 
    }
    else{
        notify('error', data.message, 'Balance Sheet Errors');
        $.validator("balance_sheet_form", data.errors);
    }

}
 

function trial_sheet_callBack(data){

    if(data.status){
        window.open(data.url, '_blank'); 
    }
    else{
        notify('error', data.message, 'Trial Balance Errors');
        $.validator("trial_sheet_form", data.errors);
    }

}

function report_trial_sheet_callBack(data){

    if(data.status){
        window.open(data.url, '_blank'); 
    }
    else{
        notify('error', data.message, 'Trial Balance Errors');
        $.validator("trial_sheet_form", data.errors);
    }

}

function report_balance_sheet_callBack(data){
    if(data.status){
        window.open(data.url, '_blank'); 
    }
    else{
        notify('error', data.message, 'Balance Sheet Errors');
        $.validator("report_balance_sheet_form", data.errors);
    }

}
 