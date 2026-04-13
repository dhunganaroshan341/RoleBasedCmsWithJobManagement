<div class="d-flex align-items-center gap-2 mb-4 mt-4">
    <select id="categoryFilter" class="form-select">
        <option value="">All Categories</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
    </select>

    <!-- Hidden reorder button -->
    <button id="reorderBtn" class="btn btn-dark" style="display:none;">Reorder</button>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="reorderModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reorder Section Contents</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <ul id="sortableList" class="list-group"></ul>
            </div>
            <div class="modal-footer">
                <button id="saveOrderBtn" class="btn btn-success">Save Order</button>
            </div>
        </div>
    </div>