@if(session()->has('message') | session()->has('success'))
    <div class="toast-container position-absolute top-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto"><i class="rounded fas fa-circle-info"></i></strong>
                <small>{{ now() }}</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('message') }}
                {{ session('success') }}
            </div>
        </div>
    </div>

    <script>
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl)
        })
        toastList.forEach(toast => toast.show())
    </script>
@endif
@if ($errors->any())
<div class="toast-container position-absolute top-0 end-0 p-3" style="z-index: 11">
    @foreach ($errors->all() as $error)
    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto"><i class="rounded fas fa-circle-info"></i></strong>
            <small>{{ now() }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ $error }}
        </div>
    </div>
    @endforeach
</div>

<script>
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    var toastList = toastElList.map(function (toastEl) {
        return new bootstrap.Toast(toastEl)
    })
    toastList.forEach(toast => toast.show())
</script>
@endif