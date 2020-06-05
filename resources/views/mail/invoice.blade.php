<!DOCTYPE html>
<html>
    <head>
        <title>Order Placement Conferm</title>
    </head>
    <body>
        Hello <b><i>{{ $info2->ship_name }}</i></b>,
        <p>This email is for successfull order placement! Also to conferm, your payment is successfull.</p>
        
        &nbsp;
        <p><b><u>Payment Details:</u></b></p>
        <div>
            <p><b>Paypent Type:</b>&nbsp;{{ $info->payment_type }}</p>
            <p><b>Paypent ID:</b>&nbsp;{{ $info->payment_id }}</p>
            <p><b>Paypent Amount:</b>&nbsp;{{ $info->total }}</p>
        </div>
        
        &nbsp;
        <p>You can track your order using <b>Status Code: <i>{{ $info->status_code }}</i></b>.</p>
        
        &nbsp;
        <p>Thank you for staying with us.</p>
        
    </body>
</html>