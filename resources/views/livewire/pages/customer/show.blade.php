<div wire:ignore.self class="modal fade" id="showCustomerModal" tabindex="-1" aria-labelledby="customerModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerModalLabel">Data Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="resetFields"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name" name="name" wire:model="name" required>
                        <div id="name_help" class="form-text">Required, min: 5 character</div>

                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" rows="3" wire:model="address" required></textarea>
                        <div id="adress_help" class="form-text">Required</div>

                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" aria-describedby="phone_number_help" name="phone_number" wire:model="phone_number" required>
                        <div id="phone_number_help" class="form-text">Required, min: 10 character</div>

                        @error('phone_number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button wire:click.prevent="delete()" wire:loading.attr="disabled" class="btn btn-danger">
                    <span wire:ignore>
                        <i data-feather="trash"></i>
                    </span>
                    Delete
                </button>

                <button wire:click.prevent="update()" wire:loading.attr="disabled" class="btn btn-dark">
                    <span wire:ignore>
                        <i data-feather="save"></i>
                    </span>
                    Update
                </button>
            </div>
        </div>
    </div>
</div>
