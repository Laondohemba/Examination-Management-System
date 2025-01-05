<x-student>
    @if (session('success'))
        <div class="text-bg-success p-2 my-3 w-50">
            {{session('success')}}
        </div>
    @endif
    <h3 class="text-center my-3">Students Dashboard</h3>
</x-student>