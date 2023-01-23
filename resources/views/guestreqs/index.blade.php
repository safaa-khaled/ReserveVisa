@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>All Reservation Requests</h3>
                    </div>
                    <div class="card-body">
                        <table
                            class="table table-bordered table-striped {{ count($guestreqs) > 0 ? 'datatable' : '' }} dt-select">
                            <thead>
                                <tr>
                                    <th>Guest Name</th>
                                    <th>Guest Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($guestreqs) > 0)
                                    @foreach ($guestreqs as $guestreq)
                                        <tr data-entry-id="{{ $guestreq->id }}">
                                            <td>{{ $guestreq->guest->title }} {{ $guestreq->guest->name }} </td>
                                            <td>{{ $guestreq->guest->email }} </td>
                                            <td>
                                                <a href="{{ route('guestreqs.show', [$guestreq->id]) }}"
                                                    class="btn btn-sm btn-primary">View Details</a>
                                                <a href="{{ route('send-guest-req-email', [$guestreq->guest->id]) }}"
                                                    class="btn btn-sm btn-success">Confirm Request</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">No Reservation Requests in Database</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
