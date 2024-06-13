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
                <h3>All Orders</h3>
                <br>
                <div class="table_center">
                <table>
                    <tr>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Payment Status</th>
                        <th>Status</th>
                        <th>Change Status</th>
                        <th>Print Receipt</th>
                    </tr>
                    @foreach ($data as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->rec_address}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->product->title}}</td>
                        <td>{{$data->product->price}}</td>
                        <td>
                            <img width="150" src="products/{{$data->product->image}}">
                        </td>
                        <td>{{$data->payment_status}}</td>
                        <td>
                            @if ($data->status == 'in progress')
                                <span style="color:red;">{{$data->status}}</span>
                                @elseif ($data->status == 'On The Way')
                                <span style="color: skyblue;">{{$data->status}}</span>
                                @else
                                <span style="color: yellow;">{{$data->status}}</span>
                            @endif
                        </td>
                    <td>
                        <a class="btn btn-primary" href="{{url('on_the_way',$data->id)}}">On The Way</a>

                        <a class="btn btn-success" href="{{url('delivered',$data->id)}}">Delivered</a>
                    </td>
                    <td class="btn btn-secondary"><a href="{{url('print_receipt',$data->id)}}">Print Receipt</a>
                    </td>
                </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@include('admin.footer')
</body>

</html>
