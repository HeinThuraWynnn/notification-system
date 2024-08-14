@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="pb-5 text-center">Code Challenge</h1>

    <!-- Display Status Message -->
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <div class="row">
        <!-- First Column: Mail Notification Form -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Send Mail Notification</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('send.notification') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="notificationType">Select Notification Type:</label>
                            <select name="type" id="notificationType" class="form-control">
                                @foreach($notificationTypes as $type)
                                <option value="{{ $type->type }}">{{ $type->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="message">Message:</label>
                            <textarea name="message" id="message" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Send Notification</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Second Column: Subscription Table -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Subscribe by Notification Types</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subscribed Notifications</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <form method="POST" action="{{ route('subscribe', $user->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <select name="notification_types[]" multiple class="form-control">
                                                @foreach($notificationTypes as $type)
                                                <option value="{{ $type->id }}"
                                                    {{ in_array($type->id, $user->notificationTypes->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                    {{ $type->type }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection