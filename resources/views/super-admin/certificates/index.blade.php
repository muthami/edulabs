@extends('super-admin.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3>{{__('Certificates')}}</h3>
                </div>
                <div class="col text-end">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#create-new">
                        {{__('Create New')}}
                    </button>
                </div>
            </div>
            <table id="app-data-table" class="table table-light">
                <thead>
                <tr>
                    <th>{{__('Date Issued')}}</th>
                    <th>{{__('Awarded To')}}</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($certificates as $cert)
                    <tr>
                        <td> <i class="menu-icon bi bi-patch-check" style="color:#0acf83;"></i> {{ date('F j, Y H:m A', strtotime($cert->created_at)) }}</td>
                        <td>{{ optional($cert->user)->first_name }} {{ optional($cert->user)->last_name }}</td>
                        <td>
                            <a href="{{ route('certificates.download', $cert->id) }}" target="_blank" class="btn btn-sm btn-primary">
                                {{ __('View') }}
                            </a>
                            &nbsp;
                            <a href="{{ ("$base_url/super-admin/certificates?delete=$cert->id") }}" onclick="return confirm('Are you to delete this certificate?')" class="btn btn-sm btn-danger">
                                {{ __('Delete') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create New Certificate Modal -->
    <div class="modal fade" id="create-new" tabindex="-1" aria-labelledby="create-new-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('certificates.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="create-new-label">{{__('Create New Certificate')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">{{__('Title')}}</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient" class="form-label">{{__('Recipient')}}</label>
                            <select class="form-control" name="user_id" required>
                                <option value="">--:--</option>
                                @foreach($list_users as $u)
                                    <option value="{{ $u->id }}">{{ $u->first_name }} {{ $u->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
