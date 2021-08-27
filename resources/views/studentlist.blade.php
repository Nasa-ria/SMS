
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
 <div class="card mb-3">
    <img src="https://cdn.pixabay.com/photo/2015/05/19/14/55/educational-773651_960_720.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">List of students</h5>
        <p class="card-text">You can find here all the informatins about students in the system</p>

        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">CNE</th>
                <th scope="col">First Name</th>
                <th scope="col">Second Name</th>
                <th scope="col">Age</th>
                <th scope="col">Speciality</th>


            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$student->cne}}</td>
                    <td>{{$student->firstName}}</td>
                    <td>{{$student->SecondName}}</td>
                    <td>{{$student->Age}}</td>
                    <td>{{$student->Speciality}}</td>
                    <td style="display: inline-flex;">
                      
                        <!-- <a href="{{route('SMS.edit',$student->id)}}"class="btn btn-sm btn-warning">Edit</a> -->
                    
                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
