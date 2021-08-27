
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
        <div style="align:center;margin:auto;">
            <form action="{{url('/updatefood',$data['id'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data['id']}}">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{$data['title']}}" class="form-control" id="title" placeholder="Enter Food Title">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="num" name="price" value="{{$data['price']}}" class="form-control" id="price" placeholder="Enter Price">
                </div>
                <div class="form-group">
                    <label for="price">Description</label>
                    <input type="textbox" name="description" value="{{$data['description']}}" class="form-control" id="description" placeholder="Enter Description">
                </div>
                <div class="form-group">
                    <label for="price">Image</label>
                    <input type="file" name="image" value="{{$data['image']}}" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    
    </div>
    @include("admin.adminscript")
</body>

</html>