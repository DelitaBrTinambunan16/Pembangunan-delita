@if (session('success'))
    <div class="container mx-auto px-6">
        <div class="mb-4 text-sm text-green-700 bg-green-100 border border-green-200 rounded p-3">
            {{ session('success') }}
        </div>
    </div>
@endif

@if (session('error'))
    <div class="container mx-auto px-6">
        <div class="mb-4 text-sm text-red-700 bg-red-100 border border-red-200 rounded p-3">
            {{ session('error') }}
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="container mx-auto px-6">
        <div class="mb-4 text-sm text-red-700 bg-red-100 border border-red-200 rounded p-3">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
