<div class="row ">
    @foreach ($blogs as $blog)
    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
        <div class="card h-100 shadow-none border">
            <div class="card-header">
                <div class="rounded-4 text-center">
                    {{-- TODO: IMAGES --}}
                    <a href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo-1/app/academy/course-details">
                        <img class="img-fluid" src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/img/pages/app-academy-tutor-1.png" alt="tutor image 1">
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge bg-label-primary">{{ $blog->category->name }}</span>
                </div>
                <a href="#" class="h5">{{ $blog->title }}</a>
                <p class="mt-2">{{ str()->limit($blog->content, 100) }}.</p>
                <p class="d-flex align-items-center mb-3 text-secondary">
                    <i class="ti ti-clock me-1"></i>
                    {{ \Carbon\Carbon::parse($blog->created_at)->format('F j, Y : H:i') }}
                </p>

                <div class="d-flex flex-column flex-md-row gap-2 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">
                    <x-link-button color="label-danger btn-sm w-100 waves-effect d-flex align-items-center py-2" icon="tf-icons fas fa-trash ti-xs me-1">
                        &nbsp; <span>Delete</span>
                    </x-link-button>
                    <x-link-button color="label-secondary btn-sm w-100 waves-effect d-flex align-items-center py-2" icon="tf-icons fas fa-edit ti-xs me-1">
                        &nbsp; <span>Edit</span>
                    </x-link-button>
                    <x-link-button color="label-info btn-sm w-100 waves-effect d-flex align-items-center py-2" icon="tf-icons fas fa-eye ti-xs me-1">
                        &nbsp; <span>Detail</span>
                    </x-link-button>
                </div>

            </div>
        </div>
    </div>
    @endforeach

</div>
