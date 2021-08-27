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
            <form action="{{url('/updatechef',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$data->name}}" class="form-control" id="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="speciality">Speciality</label>
                    <input type="textbox" name="speciality" value="{{$data->speciality}}" class="form-control" id="speciality" placeholder="Enter Speciality">
                </div>
                <div class="form-group">
                    <label for="price">Image</label>
                    <input type="file" name="image" class="form-control" id="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    
    </div>
    @include("admin.adminscript")
</body>

</html>