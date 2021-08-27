
            <x-app-layout>
            
            </x-app-layout><!DOCTYPE html>
<html lang="en">

<head>
    @include("admin.admincss")
</head>

<body>
    <div class="container-scroller">
        @include("admin.navbar")
        <div>
            <h1 style="font-size: -webkit-xxx-large;">Users</h1>
        </div>
        <div style="align:center;margin:auto;">
            <table class="table table-striped table-hover">
            <thead>
                <tr style="background: aliceblue">
                    <th>ID</th>
                    <th>ACTION</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                </tr>
            </thead>
                @foreach($data as $users)
                <tr>
                    <td>{{$users['id']}}</td>
                    @if($users['usertype']==0)
                    <td><a href="{{url('/deleteuser',$users['id'])}}"> <i class="mdi mdi-delete"></i> </a></td>
                    @else
                    <td>Not Allowed</td>
                    @endif
                    <td>{{$users['name']}}</td>
                    <td>{{$users['email']}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    @include("admin.adminscript")
</body>

</html>