<x-dashboard::app-layout title="Главная">
    <div class="h-100">
        <div class="row mb-3 pb-1">
            <div class='col-12'>
                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-16 mb-1">
                            {{ __('Hello!') }}
                            {{ auth()->user()->name }}
                        </h4>
                    </div>
                </div><!-- end card header -->
            </div>
        </div>
    </div>
</x-dashboard::app-layout>
