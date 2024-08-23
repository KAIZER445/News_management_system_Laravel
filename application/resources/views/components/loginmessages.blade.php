@if (@session('success'))
    <div class="alert alert-success alert-dismissable fade show message-alert" role="alert">
        <strong>Success!</strong>{{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (@session('error'))
    <div class="alert alert-danger alert-dismissable fade show d-flex justify-content-between message-alert" role="alert">
        <strong>Error! {{session('error')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif