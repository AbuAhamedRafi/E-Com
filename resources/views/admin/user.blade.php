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
                            <th>User Type</th>
                            <th>Update</th>
                            <th>Delete User</th>
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
                                 <td>
                                    <form action="{{ route('update-usertype') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <select name="usertype">
                                            <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                                        </select>
                                        <td><button type="submit">Update</button></td>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('delete-user') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </form>
                                </td>
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