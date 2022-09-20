@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
            <span>{{ $error }}. </span>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- if has any session with key success show it. --}}
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div>
            {{ session()->get('success') }}
        </div>
    </div>
@endif


{{-- if has any session with key success show it. --}}
@if (session()->has('success_note_status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div>
            {{ session()->get('success_note_status') }}
        </div>
    </div>
@endif

{{-- if has any session with key success show it. --}}
@if (session()->has('note_update'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div>
            {{ session()->get('note_update') }}
        </div>
    </div>
@endif


{{-- if has any session with key success show it. --}}
@if (session()->has('note_delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div>
            {{ session()->get('note_delete') }}
        </div>
    </div>
@endif

{{-- If has any error --}}
@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div>
            {{ session()->get('error') }}
        </div>
    </div>
@endif
