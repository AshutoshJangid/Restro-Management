<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    @include("admin.admincss")
</head>

<body>
    <div class="container-scroller">
        @include("admin.navbar")
        <div>
            <h1 style="font-size: -webkit-xxx-large;">Orders</h1>
        </div>
        <div style="align:center;margin:auto;">
            <table class="table table-striped table-hover">
                <thead>
                    <tr style="background: aliceblue">
                        <th>Action</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Order Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead> @foreach($data as $orders)
                <tbody>
                    @php
                    $price = ($orders->price)*($orders->quantity)
                    @endphp
                    <tr>
                        <td><a href="{{url('/complete',$orders->cid)}}">Complete</a></td>
                        <td>{{$orders->name}}</td>
                        <td>{{$orders->phone}}</td>
                        <td>{{$orders->title}}</td>
                        <td>{{$orders->quantity}}</td>
                        <td>${{$orders->price}}</td>
                        <td>${{$price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include("admin.adminscript")
</body>

</html>