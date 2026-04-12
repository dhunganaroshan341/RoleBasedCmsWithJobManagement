<div class="card mb-3 shadow-sm">
    <div class="row justify-around card-body">
        <div class="col-6">
            <h3 class="mb-3">
                {{ ucwords(str_replace('/', ' > ', request()->path())) }}
            </h3>
        </div>
        <div class="col-6 text-end">
            <button type="button" class="btn btn-dark mb-3 {{ $buttonClass ?? 'addUserButton' }}" data-action="add">
                <i class="fas fa-plus"></i> Create
            </button>
        </div>
    </div>
</div>