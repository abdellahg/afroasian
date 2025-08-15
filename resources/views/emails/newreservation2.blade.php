<html>
<head>
	<title>Afro Asian Travel Agency</title>
	<link href="https://svc.webspellchecker.net/spellcheck31/lf/scayt3/ckscayt/css/wsc.css" rel="stylesheet" type="text/css" />
	<link href="https://svc.webspellchecker.net/spellcheck31/lf/scayt3/ckscayt/css/wsc.css" rel="stylesheet" type="text/css" />
</head>
<body aria-readonly="false" style="cursor: auto; color:#000;"><img alt="logo" src="http://afroasiantravel.com/assets/site/img/logo-invert.png" style="height:56px; width:100px" /><br /><br />
Greetings from Afro Asian travel agency<br />
<br />
Thank you fro your booking, we look froward to having you join our tour.<br />
Please find your information&nbsp;for the booking that you have made below.
<hr /><strong>Reservation Details:</strong><br />
<br />
Reservation Number : {{$reservation_number}} <br />
Name: {{$user_name}} <br />
Contact Email: {{$user_email}} <br />
&nbsp;
<hr /><strong>Booking Details:</strong><br />
<br />
Arrivaldate:&nbsp;{{date('l, jS F Y',strtotime($arrivaldate))}}<br /><br />
Depaturedate:&nbsp;{{date('l, jS F Y',strtotime($depaturedate))}}<br /><br />

<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:400px">
	<tbody>
		<tr>
            <td>{{$persons}}&nbsp; &nbsp; Person &nbsp;</td>
            <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ${{ $person_price }} /per person</td>
        </tr>
		
		<tr>
			<td>Total Amount:</td>
			<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;${{ $total_amount }}</td>
		</tr>
	</tbody>
</table>
<br />
<br />
<br />
<br />
<br />
&nbsp;
<hr /><br />
<strong>Payment:</strong><br />
<br />
Total amount of your tour will be&nbsp;&nbsp; ${{ $total_amount }}<br />
You should pay 25% of total amount at bank transfer to confirm your reservation and complete the amount payment upon arrival.<br />
Deposit amount  will be&nbsp;&nbsp; ${{ $deposit_amount }}<br />
&nbsp;
<hr />Located of&nbsp; the top your booking conformation you can check our Terms and Conditions and Cancellation Policies.<br />
Please insure you read and adhere to the polices as outlined.<br />
<br />
Kind Regards<br />
<br />
Afro Asian Travel</body>
</html>

