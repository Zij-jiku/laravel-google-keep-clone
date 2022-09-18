@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4">
                <h2 class="my-3">
                    Add Note
                </h2>

                {{-- start --}}
                <form action="{{ route('googlekeep.store') }}" method="POST">
                    @csrf

                    @include('partials.messages')
                    <div class="mb-3">
                        <label for="category" class="form-label">Note Category
                            <a class="btn btn-primary btn-sm mx-4" href="{{ route('categories.create') }}">(+ Category
                                Create)</a>
                        </label>
                        <select name="category_id" id="category" class="form-control">
                            <option disabled>--Select Category--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Write task title" value="{{ old('title') }}">
                    </div>

                    <div class="mb-3">
                        <label for="note" class="form-label">Note</label>
                        <textarea class="form-control" id="note" name="note" rows="3" value="{{ old('note') }}"></textarea>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                        <a href="" class="btn btn-secondary mx-2">Back</a>
                    </div>
                </form>
                {{-- end --}}
            </div>

            <div class="col-md-8">

                <div class="row">

                    <div class="row my-3">
                        <div class="col-md-12">
                            <h2>Category</h2>
                        </div>
                        <div class="col-12 col-md-6">
                            @foreach ($categories as $category)
                                <a href="{{ url('category/search', $category->id) }}"
                                    class="btn btn-primary">{{ $category->category_name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <h2>Note View</h2>

                    @foreach ($googlekeeps as $googlekeep)
                        <div class="col-md-3 mb-3">
                            <div class="shadow">
                                <div class="card text-white bg-secondary mb-3">
                                    <div class="card-header">
                                        {{ $googlekeep->title }}

                                        <span class="bg-info px-3 py-1 text-white rounded-4 text-capitalize"
                                            style="font-size: 14px !important">
                                            {{ $googlekeep->category->category_name }}
                                        </span>

                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{ $googlekeep->note }}</p>

                                        <div>
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('googlekeep.edit', $googlekeep->id) }}">Edit</a>
                                            <a class="btn btn-danger btn-sm ml-2" data-bs-toggle="modal"
                                                href="#deleteModal{{ $googlekeep->id }}">
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- model view Delete --}}
                        <div class="modal fade" id="deleteModal{{ $googlekeep->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModal{{ $googlekeep->id }}Label"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModal{{ $googlekeep->id }}Label">Are you sure ?
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Google Keep - <mark>{{ $googlekeep->title }}</mark> will be deleted
                                            permanently. Are you sure to delete ?
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('googlekeep.destroy', $googlekeep->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Model View Edit --}}


                    @endforeach

                </div>
            </div>


            {{-- single item --}}


        </div>
    </div>
@endsection