@if (Session::has('success') || Session::has('fail'))
<div class="row">
    <div class="col-12">
        <div class="alert alert-dismissible {{ Session::has('success') ? 'alert-success' : 'alert-danger' }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5>
                <i class="icon fas {{ Session::has('success') ? 'fa-check' : 'fa-exclamation-triangle' }}"></i>
                <span>{{ Session::has('success') ? 'Success' : 'Fail' }}</span>
            </h5>
            <span>{{ Session::has('success') ? Session::get('success') : Session::get('fail') }}</span>
        </div>

    </div>
</div>
@endif
