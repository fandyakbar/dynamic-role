<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Permission</th>
            <th>Action</th>
        </tr>
        @foreach ($user as $users)
            <tr>

                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                <td>
                    @foreach ($users->getDirectPermission() as $permission)
                        <span>{{ $permission }}</span>
                    @endforeach
                </td>
                <td>{{ $users->name }}</td>

            </tr>
        @endforeach

    </table>

</body>

</html>
