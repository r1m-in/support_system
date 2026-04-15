@if ($errors->any())
    <div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row p-5 mb-10">
        <span class="svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                    fill="currentColor" />
                <rect x="11" y="14" width="7" height="2" rx="1"
                    transform="rotate(-90 11 14)" fill="currentColor" />
                <rect x="11" y="17" width="2" height="2" rx="1"
                    transform="rotate(-90 11 17)" fill="currentColor" />
            </svg>
        </span>
        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
            <h4 class="mb-2 text-light">Whoops! Something went wrong.</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif