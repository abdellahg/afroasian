<html>
<head>
	<title>New Reservation From Website</title>
	<link href="https://svc.webspellchecker.net/spellcheck31/lf/scayt3/ckscayt/css/wsc.css" rel="stylesheet" type="text/css" />
	<link href="https://svc.webspellchecker.net/spellcheck31/lf/scayt3/ckscayt/css/wsc.css" rel="stylesheet" type="text/css" />
</head>
<body aria-readonly="false" style="cursor: auto; color:#000;"><img alt="logo" src="http://afroasiantravel.com/assets/site/img/logo-invert.png" style="height:56px; width:100px" /><br /><br />

<strong>Reservation Details:</strong><br />
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

</body>
</html>

