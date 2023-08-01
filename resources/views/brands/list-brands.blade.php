@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>List brand</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table id="table-brands" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        image/Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Address</th>
                                    <th class="text-secondary ">
                                      @auth
                                          <a href="{{ route('brand-add') }}"><button type="button"
                                                class="btn btn-primary">Add new</button></a>
                                      @endauth
                                      </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($brands as $row)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ asset('storage/' . $row->image) }}"
                                                        class="avatar avatar-lg me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $row->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $row->address }}</p>
                                        </td>
                                        <td class="align-middle">
                                          @auth
                                              <a href="{{ route('brand-edit', ['id' => $row->id]) }}"
                                                class="text-secondary font-weight-bold text-xs me-3" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                Edit
                                            </a>
                                            <a href="{{ route('brand-delete', ['id' => $row->id]) }}"
                                                onclick="return confirm('Are you sure you want to delete this item?');"
                                                class="text-danger font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                Remove
                                            </a>
                                          @endauth

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        {{ $brands->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
