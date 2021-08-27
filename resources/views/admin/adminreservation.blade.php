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
            <h1 style="font-size: -webkit-xxx-large;">Reservations</h1>
        </div>
        <div style="align:center;margin:auto;">
            <table class="table table-striped table-hover">
                <thead>
                <tr style="background: aliceblue">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Message</th>
                </tr>
            </thead>
                @foreach($data as $reserv)
                <tr>
                    <td>{{$reserv['name']}}</td>
                    <td>{{$reserv['email']}}</td>
                    <td>{{$reserv['phone']}}</td>
                    <td>{{$reserv['date']}}</td>
                    <td>{{$reserv['time']}}</td>
                    <td>{{$reserv['message']}}</td>
                    
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    @include("admin.adminscript")
</body>

</html>