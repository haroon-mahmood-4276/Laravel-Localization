@extends('app.layout.layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-xl-12">
                <div class="card my-3">
                    <div class="card-body">
                        <a href="{{ route('tests.create') }}"
                            class="btn btn-primary">{{ __('tests.index.btn_add_test') }}</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        {{ __('tests.index.featured') }}
                        <h5 class="card-title">{{ __('tests.index.index') }}</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"></th>
                                    <th scope="col">{{ __('tests.index.name') }}</th>
                                    <th scope="col">{{ __('tests.index.description') }}</th>
                                    <th scope="col">{{ __('tests.index.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($tests as $test)
                                    @php
                                        $imagePath = explode('.', $test->image);
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $count++ }}</th>
                                        <td><img src="{{ route('imagepath', ['name' => $imagePath[0], 'ext' => $imagePath[1]]) }}"
                                                alt="" width="50"></td>
                                        <td>{{ __('tests.index.var_name', ['name' => $test->name]) }}</td>
                                        <td>{{ __('tests.index.var_description', ['description' => $test->description]) }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a class="btn btn-outline-warning mx-2"
                                                    href="{{ route('tests.edit', ['test' => $test->id]) }}">{{ __('tests.index.btn_edit') }}</a>
                                                <form action="{{ route('tests.destroy', ['test' => $test->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-outline-danger mx-2">{{ __('tests.index.btn_delete') }}</button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td colspan="5">
                                        {{ $tests->onEachSide(1)->links('app.layout.components.pagination') }}
                                    </td>
                                    {{-- <td colspan="2">
                                        [{{ $tests->firstItem() }} ~ {{ $tests->lastItem() }}] out of
                                        {{ $tests->total() }}
                                    </td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
