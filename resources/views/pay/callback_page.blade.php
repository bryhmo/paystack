<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment callback</title>
</head>
<body>
    <table>
        <tbody>
            <tr> <td>{{ $loop->iteration }}</td></tr> 
            <tr><td>Transaction ID::</td><td>{{$data->id}}</td></tr>
            <tr><td>Status::</td><td>{{$data->status}}</td></tr>
            <tr><td>Paid_at::</td><td>{{$data->paid_at}}</td></tr>
            <tr><td>Currency::</td><td>{{$data->currency}}</td></tr>
            <tr><td>Email::</td><td>{{$data->email}}</td></tr>
            <tr><td>First Name::</td><td>{{$data->first_name}}</td></tr>
            <tr><td>Last Name::</td><td>{{$data->last_name}}</td></tr>
            <tr><td>Phone::</td><td>{{$data->phone}}</td></tr>
            <tr><td>Card Type:</td><td>{{$data->card_type}}</td></tr>
        </tbody>
    </table>
</body>
</html>