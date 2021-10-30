@extends('app.layout.layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('tests.create.featured') }}
                        <h5 class="card-title">{{ __('tests.create.create') }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tests.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="data[en][name]" value="{{ old('name') }}"
                                    placeholder="{{ __('tests.create.name') }}">
                                <label for="name">{{ __('tests.create.name') }}</label>
                                @error('name')
                                    <div class="form-text invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control @error('name') is-invalid @enderror"
                                    placeholder="{{ __('tests.create.description') }}" name="data[en][description]"
                                    id="description" rows="150">{{ old('description') }}</textarea>
                                <label for="description">{{ __('tests.create.description') }}</label>
                                @error('description')
                                    <div class="form-text invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="data[ar][name]" value="{{ old('name') }}"
                                    placeholder="{{ __('tests.create.name') }}">
                                <label for="name">{{ __('tests.create.name') }}</label>
                                @error('name')
                                    <div class="form-text invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control @error('name') is-invalid @enderror"
                                    placeholder="{{ __('tests.create.description') }}" name="data[ar][description]"
                                    id="description" rows="150">{{ old('description') }}</textarea>
                                <label for="description">{{ __('tests.create.description') }}</label>
                                @error('description')
                                    <div class="form-text invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">{{ __('tests.create.upload_image') }}</label>
                                <input class="form-control @error('image') is-invalid @enderror" name="image" type="file"
                                    id="image">
                                @error('image')
                                    <div class="form-text invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">{{ __('tests.create.btn_save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
