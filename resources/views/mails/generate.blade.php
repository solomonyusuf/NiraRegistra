<!DOCTYPE html>
<html>

<head>
    <title>New Token</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body style="font-family: Arial, sans-serif; background-color: #135f1c; margin: 0; padding: 0;">

<table align="center" width="600"
       style="margin: 0 auto;" cellspacing="0" cellpadding="0" border="0" aliargin-top: 30px; background-color: #fff;">
    <tr>
        <td style="padding: 20px 0; text-align: center;">
            <img src="{{asset('nira_logo.png')}}" width="100" height="auto">
        </td>
    </tr>
    <tr>
        <td style="background-color: #fff; padding: 30px 30px;">
            <h1 style="font-size: 20px; color: #333; margin: 0; font-weight: bold; text-align: center;">{{$subject}}</h1>
            <p style="font-size: 16px; color: black; margin: 20px 0;">The Database Token has been generated for authorized access</p>
            <p style="font-size: 24px; font-weight:600; color: #135f1c; margin-bottom: 10px; ">{{ $token }}</p>
            <p style="font-size: 16px; color: #333; margin: 0;">Best regards, <br> NIRA Support Team.</p>
        </td>
    </tr>
</table>

<!-- Footer -->
<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600"
       style="margin: 0 auto; margin-bottom: 20px; background-color: lightgray;">

    <tr>
        <td style="padding: 20px 0; text-align: center;">
            <p style="font-size: 13px; color: white; margin: 0;">8, Funsho Wiliams Avenue, Iponri, Surulere, Lagos. Nigeria.</p>
            <p style="font-size: 13px; color: white; margin: 0;">&copy;Copyright - 2024 - NIRA. All right reserved.</p>
        </td>
    </tr>
</table>

</body>

</html>
