<div wire:ignore.self class="modal fade" id="brandModal" tabindex="-1" aria-labelledby="brandModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="brandModalLabel">Create Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="resetFields"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name_help" name="name" wire:model="name" required>
                        <div id="name_help" class="form-text">Required, min: 5 character</div>

                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button wire:click.prevent="store()" wire:loading.attr="disabled" class="btn btn-primary">
                    <span wire:ignore>
                        <i data-feather="save"></i>
                    </span>
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
