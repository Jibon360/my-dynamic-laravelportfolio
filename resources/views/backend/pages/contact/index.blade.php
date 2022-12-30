@extends('backend.layouts.master')
@section('title', 'list contact')
@section('contact', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">contact/</span> contact List</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">List contact</h5>
                    <small class="text-muted float-end"><a href="{{ route('contact.create') }}"
                            class="btn btn-primary btn-sm">Add
                            contact</a></small>
                </div>
                <div class="card">
                    @if (session()->has('create_message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ session()->get('create_message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('destroy_message'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ session()->get('destroy_message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('update_message'))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            {{ session()->get('update_message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive text-nowrap">
                        <table class="table table-striped" id="example">
                            <thead class="table-light">
                                <tr>
                                    <th>Si No</th>
                                    <th>Icon</th>
                                    <th>Tittle</th>
                                    <th>Descrpt</th>
                                    <th>Created Time</th>
                                    <th>Updated Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($contacts as $contact)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $contact->contact_icon }}</td>
                                        <td>{{ $contact->contact_heading }}</td>
                                        <td>{{ $contact->contact_name }}</td>
                                        <td>
                                            <ul>
                                                @isset($contact->created_at)
                                                    <li>day: {{ $contact->created_at->format('d/M/Y') }}</li>
                                                    <li>time: {{ $contact->created_at->format('h:i:s A') }}</li>
                                                    <li><span
                                                            class="badge bg-label-success me-1">{{ $contact->created_at->diffForHumans() }}</span>
                                                    </li>
                                                @endisset
                                            </ul>
                                        </td>

                                        <td>
                                            <ul>
                                                @isset($contact->updated_at)
                                                    <li>day: {{ $contact->updated_at->format('d/M/Y') }}</li>
                                                    <li>time: {{ $contact->updated_at->format('h:i:s A') }}</li>
                                                    <li><span
                                                            class="badge bg-label-warning me-1">{{ $contact->updated_at->diffForHumans() }}</span>
                                                    </li>
                                                @endisset
                                            </ul>
                                        </td>
                                        <td class="">
                                            <div class="d-flex">
                                                <form action="{{ route('contact.destroy', ['contact' => $contact->id]) }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class=" btn btn-danger btn-sm"><i
                                                            class='bx bxs-trash'></i></button>
                                                </form>

                                                <a href="{{ route('contact.edit', ['contact' => $contact->id]) }}"
                                                    class="ms-2 btn btn-success btn-sm"><i class='bx bxs-edit'></i></a>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
