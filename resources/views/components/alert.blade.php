@if (session('success'))
    <div class="alert alert-success">
        <strong>{{ session('success') }}</strong>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        <strong>{{ session('error') }}</strong>
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning">
        <strong>{{ session('warning') }}</strong>
    </div>
@endif 

@if (session('info'))
    <div class="alert alert-info">
        <strong>{{ session('info') }}</strong>
    </div>
@endif