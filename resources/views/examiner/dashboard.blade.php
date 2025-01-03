<x-examiner>
    <examinerdashboard></examinerdashboard>

    @if (session('success'))
        <div class="text-bg-success p-2">
            {{session('success')}}
        </div>
    @endif
    <h3 class="text-center">Dashboard</h3>
</x-examiner>