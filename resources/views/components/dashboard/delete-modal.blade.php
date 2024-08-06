@props(['item', 'id', 'action'])

<x-dashboard.modal :id="$id" title="Deleting a {{ $item->name }}">
    <div class="text-center">
        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548"
            style="width: 90px; height: 90px"></lord-icon>
        <div class="mt-4 text-center">
            <h4 class="fs-semibold">Are you sure you want to delete?</h4>
            <p class="text-muted fs-14 mb-4 pt-1">
                Deleting a {{ $item->name }} will delete all information from our database.
            </p>
            <div class="hstack justify-content-center remove gap-2">
                <button class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal">
                    <i class="ri-close-line me-1 align-middle"></i> Close
                </button>
                <form action="{{ $action }}" method="post">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger" id="delete-record">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-dashboard.modal>
