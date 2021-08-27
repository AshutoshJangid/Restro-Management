
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
            <h1 style="font-size: -webkit-xxx-large;">Chef List</h1>
        </div>
        <div style="align:center;margin:auto;">
            <form action="{{url('/addchef')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="speciality">Speciality</label>
                    <input type="textbox" name="speciality" class="form-control" id="speciality" placeholder="Enter Speciality">
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
                <thead>
                    <tr style="background: aliceblue">
                        <th>Action</th>
                        <th>Name</th>
                        <th>Speciality</th>
                    </tr>
                </thead>
             
                @foreach($data as $chef)
                <tr>
                    <td>
                        <a href="{{url('/deletechef',$chef['id'])}}"> <i class="mdi mdi-delete"></i> </a><!-- <i class="fa fa-trash-can"> -->
                        <a href="{{url('/editchef',$chef['id'])}}"> <i class="mdi mdi-pencil-box-outline"></i> </a><!-- <i class="fa-solid fa-pen-to-square"></i> -->
                    </td>
                    <td>{{$chef['name']}}</td>
                    <td>{{$chef['speciality']}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    @include("admin.adminscript")
</body>

</html>