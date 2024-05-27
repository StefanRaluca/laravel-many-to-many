<button type="button" class="btn btn-danger  m-1" data-bs-toggle="modal" data-bs-target="#modalId-{{ $project->id }}">
    <i class="fa fa-trash" aria-hidden="true"></i>

</button>
<div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Attention! Irreversible operation!
                    Are sure you want to delete {{ $project->title }} ?
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">This is an irreversible operation.
                Are you sure you want to run it?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Confirm
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>
