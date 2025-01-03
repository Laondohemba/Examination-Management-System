<x-examiner>
    <examinerdashboard></examinerdashboard>

    @if (session('success'))
        <div class="text-bg-success p-2 w-50 my-2 mx-auto">
            {{session('success')}}
        </div>
    @endif
    <h3 class="text-center my-2">Dashboard</h3>
</x-examiner>