@extends('layouts.panel.dashboard')

@section('content')
    <div class="container">
        <div class="card my-4">
            <div class="card-body">
                @if($notifications->count())
                    <form action="{{ route('panel.notifications.deleteAll') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete all') }}</button>
                    </form>

                    <form action="{{ route('panel.notifications.markAllReads') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">{{ __('Reads all') }}</button>
                    </form>
                @endif

                @forelse($notifications as $notification)
                    <div>
                        <small> {{ $notification->created_at->diffForHumans() }}</small>
                        <p>{{ $notification->data['message'] }}</p>
                    </div>
                    @unless($loop->last)
                        <hr>
                    @endif
                @empty
                    <p>{{ __('There is no notifications.') }}</p>
                @endforelse

                {{ $notifications->links() }}
            </div>
        </div>
    </div>
@endsection
