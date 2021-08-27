<x-app-layout>
            
            </x-app-layout>
           <!DOCTYPE html>
<html lang="en">

<head>
    
<base href="/public">
    @include("admin.admincss")
</head>

<body>
    <div class="container-scroller">
        @include("admin.navbar")
        <div>
            <h1 style="font-size: -webkit-xxx-large;">Food Menu</h1>
        </div>
        <div style="align:center;margin:auto;">
            <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Food Title">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="num" name="price" class="form-control" id="price" placeholder="Enter Price">
                </div>
                <div class="form-group">
                    <label for="price">Description</label>
                    <input type="textbox" name="description" class="form-control" id="description" placeholder="Enter Description">
                </div>
                <div class="form-group">
                    <label for="price">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div style="align:center;margin:auto;">
            <table class="table table-striped table-hover">
                <thead style="background: aliceblue">
                    <tr>
                        <th>ID</th>
                        <th>ACTION</th>
                        <th>NAME</th>
                        <th>PRICE</th>
                    </tr>
                </thead>
             
                @foreach($data as $foods)
                <tr>
                    <td>{{$foods['id']}}</td>
                    <td>
                        <a href="{{url('/deletefood',$foods['id'])}}"> <i class="mdi mdi-delete"></i> </a>
                        <a href="{{url('/editfood',$foods['id'])}}"> <i class="mdi mdi-pencil-box-outline"></i> </a>
                    </td>
                    <td>{{$foods['title']}}</td>
                    <td>{{$foods['price']}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    @include("admin.adminscript")
</body>

</html>