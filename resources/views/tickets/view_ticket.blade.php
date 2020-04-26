@extends('layouts.app')

@section('title')
    <title>Ticket - INC0009846 North Bafels Estate</title>
@endsection

@push('selective_scripts')
<!-- CKEditor -->
{{-- <script src="{{ asset('js/ckeditor.min.js') }}"></script> --}}
<script src="https://cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>
@endpush

@push('pre_load')
<script>
    $("#ticket_icon").addClass("active");
</script>
@endpush

@section('content')
<div class="container-fluid">
    <div class="w-100 py-1">
        <div class="w-100 pb-3">
            <h6 class="text-secondary mb-0">
                <span class="fal fa-ticket-alt ticket-rotate mr-1"></span> Tickets
                <span class="font-small">
                    <span class="fal fa-chevron-right mx-2"></span>
                </span>
                INC0009846 North Bafels Estate
            </h5>
        </div>

        <div class="row mx-0">
            {{-- CONTENT SECTION --}}
            <div class="col-md-8 pl-0">
                <div class="card border-0 shadow-wd mb-4">
                    <div class="card-header background-white border-0">
                        <div class="row mx-0">
                            <div class="col-md-8 px-0">
                                <div class="d-flex align-items-center pt-1">
                                    <img src="{{ asset('img/avatars/'.Auth::user()->avatar.'.png') }}" class="rounded-circle mr-2" alt="" srcset="" width="35px">
        
                                    <div class="ml-2">
                                        <span class="font-bold d-block">INC0009846 North Bafels Estate</span>
                                        <span class="badge bg-info-bright text-info">In Progress</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        {{-- TICKET DETAILS --}}
                        <div class="w-100">
                            <div class="text-secondary form-group">
                                <span class="d-block mb-2">
                                    Cum debitis doloremque dolorum eligendi facilis ipsa nam nemo possimus recusandae vel. Animi corporis dolorum eveniet minus odio porro sed unde vero!
                                </span>
                                
                                <span class="d-block">
                                    Accusantium adipisci, dignissimos dolorum et, hic illum impedit iure, libero pariatur porro quae quaerat! Aperiam commodi incidunt libero modi quam quas, recusandae reprehenderit. Ab, ad aliquid id nam quas quo sed! Blanditiis!
                                </span>
                            </div>

                            <div class="w-100 mini-attr-slot font-small text-muted">
                                <div class="d-flex align-items-center">
                                    <span class="fal fa-calendar-alt mr-2"></span>
                                    <span class="mr-2">Created: </span>
                                    <span class="m-0">4 weeks ago</span>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="w-100">
                            <div class="pt-0 pb-2">
                                <span class="font-bold">Comments:</span>
                            </div>

                            <div class="pb-1">
                                <div class="w-100 mb-2">
                                    <div class="d-flex">
                                        <div class="px-0">
                                            <img src="{{ asset('img/avatars/'.Auth::user()->avatar.'.png') }}" class="rounded-circle mr-2" alt="" srcset="" width="35px">
                                        </div>

                                        <div class="px-2 flex-fill">
                                            <span class="text-dark d-block">Ardelia Yeomans </span>
                                            <span class="text-secondary d-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, neque?</span>
                                            <span class="float-right d-block font-small pr-3 text-muted">2 days ago</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-100 mb-2">
                                    <div class="d-flex">
                                        <div class="px-0">
                                            <img src="{{ asset('img/avatars/6ADFAB691F9EB5CB14D62FFC795BC36A.png') }}" class="rounded-circle mr-2" alt="" srcset="" width="35px">
                                        </div>

                                        <div class="px-2 flex-fill">
                                            <span class="text-dark d-block">Lisetta Muehler </span>
                                            <span class="text-secondary d-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet corporis cum eaque libero nostrum unde!</span>
                                            <span class="float-right d-block font-small pr-3 text-muted">4 weeks ago</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-100 mb-2">
                                    <div class="d-flex">
                                        <div class="px-0">
                                            <img src="{{ asset('img/avatars/0687D6585F8D9BDFF6767D0529FC8095.png') }}" class="rounded-circle mr-2" alt="" srcset="" width="35px">
                                        </div>

                                        <div class="px-2 flex-fill">
                                            <span class="text-dark d-block">Gifford Rosenwald </span>
                                            <span class="text-secondary d-block">Lorem ipsum dolor sit amet.</span>
                                            <span class="float-right d-block font-small pr-3 text-muted">10 months ago</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-100 mb-2">
                                    <div class="d-flex">
                                        <div class="px-0">
                                            <img src="{{ asset('img/avatars/A073A8CC99D63B38D352BFFCA4505D14.png') }}" class="rounded-circle mr-2" alt="" srcset="" width="35px">
                                        </div>

                                        <div class="px-2 flex-fill">
                                            <span class="text-dark d-block">Brynne Mettricke</span>
                                            <span class="text-secondary d-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, temporibus!</span>
                                            <span class="float-right d-block font-small pr-3 text-muted">1 year ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ACTIVITIES --}}
                <div class="card border-0 shadow-wd">
                    <div class="card-header background-white border-0">
                        <div class="row mx-0">
                            <div class="col-8 px-0">
                                <span class="font-bold">Activities</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="w-100">
                            <div class="d-flex">
                                <div class="px-0">
                                    <figure class="avatar avatar-sm mr-3 bring-forward">
                                        <span class="avatar-title bg-info-bright text-info rounded-circle">
                                            <i class="fal fa-file-alt"></i>
                                        </span>
                                    </figure>
                                </div>

                                <div class="px-2 flex-fill">
                                    <span class="text-dark d-block mb-2"><span class="text-info">Elnore McCrillis</span> attached file <span class="float-right text-muted font-small">Sun 10:16 AM</span></span>
                                    
                                    <div class="border rounded">
                                        <div class="px-3 py-2">
                                            <span class="text-secondary">
                                                <span class="fal fa-file-excel mr-2"></span>
                                                <span>filename12334.pdf</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- UTILITY ITEMS --}}
            <div class="col-md-4 pr-0">
                {{-- TICKET ATTRIBUTES --}}
                <div class="w-100">
                    <div class="card border-0 shadow-wd pb-4">
                        <div class="card-header background-white border-0">
                            <span class="font-normal">Properties</span>
                        </div>

                        <div class="card-body pt-0 pb-0">
                            <div class="row mx-0">
                                <div class="col-4 px-0 pb-1">
                                    <span class="text-secondary font-bold">Type</span>
                                </div>
                                <div class="col-8 px-0 pb-1">
                                    <span class="text-secondary">Change Request</span>
                                </div>
                                <div class="col-8 offset-4 pb-1 px-0">
                                    <span class="text-info fas fa-bookmark mr-2"></span>
                                    <span class="text-secondary">In Progress</span>
                                </div>

                                <div class="col-8 offset-4 pb-1 px-0">
                                    <span class="text-success fas fa-square mr-1"></span>
                                    <span class="text-secondary">Low Priority</span>
                                </div>

                                <div class="col-8 offset-4 pb-2 px-0">
                                    <span class="text-info fas fa-globe-africa mr-1"></span>
                                    <span class="text-secondary">Kahawa Soweto Region</span>
                                </div>

                                <div class="col-8 offset-4 pb-2 px-0">
                                    <div class="d-flex align-items-center">
                                        <div class="px-0 mr-3">
                                            <span class="fal fa-check-circle fa-3x text-success"></span>
                                        </div>
        
                                        <div class="flex-fill px-0">
                                            <span class="text-success d-block">Within SLA</span>
                                            <span class="text-success font-small d-block">12 Hours to SLA</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mx-0">
                                <div class="col-4 pb-1 px-0">
                                    <span class="text-secondary font-bold">Assigned:</span>
                                </div>
                                <div class="col-8 pb-1 px-0">
                                    <span class="text-secondary">Jetta Tiano</span>
                                </div>
                                <div class="col-8 offset-4 pb-1 px-0">
                                    <span class="text-secondary">0712345678</span>
                                </div>

                                <div class="col-4 px-0 pb-1">
                                    <span class="text-secondary font-bold">Created by:</span>
                                </div>
                                <div class="col-8 px-0 pb-1">
                                    <span class="text-secondary">Aucoin Tiano</span>
                                </div>
                                <div class="col-8 px-0 offset-4 pb-1">
                                    <span class="text-secondary">0712345678</span>
                                </div>
                            </div>

                            <hr>
                        </div>

                        <div class="card-header pt-0 background-white border-0">
                            <span class="font-normal">Task List</span>
                        </div>

                        <div class="card-body pt-0 pb-0">
                            <div class="card-scroll px-1">
                                <div class="custom-control custom-checkbox todo-item">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label d-flex justify-content-between"
                                           for="customCheck1">Talk
                                        to new customers
                                    </label>
                                </div>

                                <div class="custom-control custom-checkbox todo-item">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2" checked>
                                    <label class="custom-control-label d-flex justify-content-between"
                                           for="customCheck2">Older
                                        users will be deleted from
                                        the system
                                    </label>
                                </div>

                                <div class="custom-control custom-checkbox todo-item">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label d-flex justify-content-between"
                                           for="customCheck3">Assignment
                                        will be
                                        completed
                                    </label>
                                </div>
                            </div>

                            <form class="mt-3">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control form-control-sm"
                                           aria-label="Example text with button addon"
                                           placeholder="Add New task" aria-describedby="button-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-success" type="button" id="button-addon1">Add Task
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection