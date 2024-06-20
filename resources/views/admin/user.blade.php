<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style type="text/css">
    table{
        border: 2px solid skyblue;
        text-align: center;
    }
    th
    {
        background-color: skyblue;
        padding: 10px;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
        color: white;
    }
    td
    {
        color: white;
        padding: 10px;
        border: 1px solid skyblue;
    }
    .table_center
    {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid"></div>
                <div>
                <h1>Users</h1>
                <br>
                <div class="table_center">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
@include('admin.footer')
</body>
</html>