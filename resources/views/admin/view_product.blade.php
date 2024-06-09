<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .div_design
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }
        .table_design
        {
            border: 2px solid greenyellow;
        }
        th
        {
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }
        td
        {
            border: 1px solid skyblue;
            text-align: center;
            color: white;
        }
        input[type="search"]
        {
            width: 400px;
            height: 50px;
            margin-left: 50px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                </div>
                <div>
                    <form action="{{url('product_search')}}" mathod="get">
                        @csrf
                        <input type="search" name="search" id="">
                        <input type="submit" class="btn btn-secondary" value="Search">
                    </form>
                </div>
                <div class="div_design">
                    <table class="table_design">
                        <tr>
                            <th>Product Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach ($product as $products)
                        <tr>
                            <td>{{$products->title}}</td>
                            <td>{!!Str::limit($products->description,50)!!}</td>
                            <td>{{$products->category}}</td>
                            <td>{{$products->price}}</td>
                            <td>{{$products->quantity}}</td>
                            <td>
                                <img height="120" width="120" src="products/{{$products->image}}">
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{url('update_product',$products->id)}}">Edit</a>
                            </td>
                            <td>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="div_design">
                    {{$product-> onEachSide(1)->links()}}
                </div>

        </div>
    </div>
@include('admin.footer')
</body>

</html>
