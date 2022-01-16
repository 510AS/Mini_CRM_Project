{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('companies.destroy', $companies->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Are you sure you want to delete{{ $companies->name }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('page.Cancel')}}</button>
        <button type="submit" class="btn btn-danger">{{trans('page.Yes, Delete')}}</button>
    </div>
</form>
