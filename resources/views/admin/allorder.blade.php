<html>
<html>

<head>
    <title>View all Orders</title>
</head>

<body>
<table border = 1>
    <tr>
        <td>ID</td>
        <td>User ID</td>

        <td>Name</td>
        <td>address</td>
        <td>Telephone Number</td>
        <td>Order  date</td>


    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->user_id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->address }}</td>

            <td>{{ $user->number }}</td>
            <td>{{ $user->updated_at }}</td>


        </tr>
    @endforeach
</table>
</body>
</html>
<head>
    <title>View Student Records</title>
</head>

<body>
<table border = 1>
    <tr>
        <td>ID</td>
        <td>Name</td>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
