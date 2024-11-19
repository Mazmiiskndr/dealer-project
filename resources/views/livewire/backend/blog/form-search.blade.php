<div>
    <form class="mb-3 d-flex row">
        <div class="col-lg-6 col-sm-12">
            {{-- <x-input-field id="name" label="Search Blog" model="form.name" placeholder="Search Blog..." /> --}}
            <label class="form-label" for="basic-icon-default-fullname">Search</label>
            <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-search"></i></span>
                <input type="text" wire:model.live.debounce.300ms="keyword" class="form-control" id="basic-icon-default-fullname" placeholder="Search Blog..." aria-label="Search Blog..." aria-describedby="basic-icon-default-fullname2">
            </div>
        </div>
        <div class="mt-lg-0 col-lg-6 col-sm-12 mt-sm-3" wire:ignore>
            <x-select-field id="category" label="Category Name" name="category" model="category" multiple :options="$categories ? $categories->toArray() : []" class="select2 form-select" data-allow-clear="true" />
        </div>

    </form>
</div>
@push('scripts')
{{-- TODO: --}}
<script>
    document.addEventListener('livewire:init', function() {
        $('.select2').select2()
        $('select[name="category"]').on('change', function() {
            console.log($(this).val());
            Livewire.dispatch('categorySelected', {
                categoryIds: $(this).val()
            })
        })
    });

</script>
@endpush
