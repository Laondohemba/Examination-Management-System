<x-examiner>

    @if (session('success'))
        <div class="text-bg-success p-2 w-50 my-2 mx-auto">
            {{ session('success') }}
        </div>
    @endif
    <h3 class="text-center my-2">{{ ucwords(auth()->user()->username) }}, welcome to Examiner</h3>
    <x-examinerdashboard></x-examinerdashboard>

    {{-- <h3 class="text-center my-3">Students enrolled for {{ $students->$examination->exam_name }} </h3> --}}

    <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Reg Number</th>
                <th>Phone</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->reg_no}}</td>
                    <td>{{$student->phone}}</td>
                    <td>
                        <a href="{{route('student.edit', $student->email)}}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('student.destroy', $student)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="bg-light pagination justify-content-end">{{$students->links('pagination::bootstrap-5')}}</div>

</x-examiner>
