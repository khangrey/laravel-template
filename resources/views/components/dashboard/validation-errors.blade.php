@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
            <i class="ri-error-warning-line label-icon"></i> {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif

@push('scripts')
    <script src="{{ asset('velzon/libs/prismjs/prism.js') }}"></script>
@endpush
