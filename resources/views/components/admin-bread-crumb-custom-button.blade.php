<div class="card mb-3 shadow-sm">
    <div class="row justify-content-between card-body">

        <div class="col-6">
            <small>
                {{ ucwords(str_replace('/', ' > ', request()->path())) }}
            </small>
        </div>

        <div class="col-6 text-end">
            @stack('button')
        </div>

    </div>
</div>