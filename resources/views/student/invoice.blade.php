<table>
    <thead>
        <th>Sl No.</th>
        <th>Name</th>
        <th>Course</th>
        <th>Email</th>
        <th>Phone</th>
    </thead>
    <tbody>
        @foreach($student as $students)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$students->name}}</td>
            <td>{{$students->course}}</td>
            <td>{{$students->email}}</td>
            <td>{{$students->phone}}</td>
        </tr>
        @endforeach
    </tbody>
</table>