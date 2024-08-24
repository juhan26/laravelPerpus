@if (session('success'))
<div class="alert alert-success d-flex align-items-center pr-3 p-2" role="alert">
    <svg class="bi flex-shrink-0 me-2 " width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#check-circle-fill" />
    </svg>
    <div class="m-1">
        {{ session('success') }}
    </div>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger d-flex align-items-center pr-3 p-2" role="alert">
    <svg class="bi flex-shrink-0 me-2 " width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#exclamation-triangle-fill" />
    </svg>
    <div class="m-1">
        {{ session('error') }}
    </div>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger d-flex align-items-center p-2" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Error:">
        <use xlink:href="#exclamation-triangle-fill" />
    </svg>
   

        @foreach ($errors->all() as $error)
            <p class="m-1">{{ $error }}</p>
        @endforeach


</div>
@endif