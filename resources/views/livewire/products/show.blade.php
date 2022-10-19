<div>
    <button type="button" class="btn-close mb-3" aria-label="Close" wire:click="cancel()"></button>

    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect></svg>
    <h3 class="mt-3">{{ $selected_product->name }}</h3>

    <h5>Stock: {{ $selected_product->stock }}</h5>
    <p>Date added: {{ $selected_product->formatDate($selected_product->created_at) }}</p>
    <p>Last updated: {{ $selected_product->formatDate($selected_product->updated_at) }}</p>

    <div class="d-grid gap-2 mt-4">
        <button class="btn btn-warning" wire:click="edit({{ $selected_product->id }})">Update</button>
        <button class="btn btn-danger" wire:click="delete({{ $selected_product->id }})">Delete</button>
    </div>


</div>
