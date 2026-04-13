<div class="dropdown d-inline">

    <button class="btn p-0 m-0 bg-transparent border-0" type="button" data-bs-toggle="dropdown">
        <i class="fas fa-ellipsis-v"></i>
    </button>

    <ul class="dropdown-menu dropdown-menu-end">

        @if (request()->route()->getName() === 'admin.user')

        @if ($data->role != 'User')
        <li>
            <button type="button" class="dropdown-item resetUserBtn" data-id="{{ $data->id }}">
                <i class="fas fa-lock me-2"></i> Change Password
            </button>
        </li>
        @endif

        @endif

        {{-- Edit --}}
        <li>
            <button type="button" class="dropdown-item editUserButton" data-id="{{ $data->id }}">
                <i class="fas fa-pencil me-2"></i> Edit
            </button>
        </li>

        {{-- Delete --}}
        <li>
            <button type="button" class="dropdown-item text-danger deleteData" data-id="{{ $data->id }}">
                <i class="fas fa-trash me-2"></i> Delete
            </button>
        </li>

    </ul>
</div>