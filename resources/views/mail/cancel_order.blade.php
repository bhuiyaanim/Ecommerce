<!DOCTYPE html>
<html>
    <head>
        <title>Order Cancelation Conferm</title>
    </head>
    <body>
        Hello <b><i>{{ $info2[0]->ship_name }}</i></b>,
        <p>This email is for successfull order cancelation!</p>
        
        &nbsp;
        <p><b><u>Payment Details:</u></b></p>
        <div>
            <p><b>Paypent Type:</b>&nbsp;{{ $info[0]->payment_type }}</p>
            <p><b>Paypent ID:</b>&nbsp;{{ $info[0]->payment_id }}</p>
            <p><b>Paypent Amount:</b>&nbsp;{{ $info[0]->total }}</p>
        </div>
        
        &nbsp;
        <p>Your money will be refunded to your account with-in 15 working day.</p>
        
        &nbsp;
        <p>Thank you for staying with us.</p>
        
    </body>
</html>