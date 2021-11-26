@extends('layouts.main')

@section('content')

<div class="cointainer-lg" style="margin: 0 auto;">
    <h2 class="text-center mt-2" style=" font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color:blue; font-weight:bold;">My bookings</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Booking id</th>
                <th scope="col">Appointment id</th>
                <th scope="col">Department name</th>
                <th scope="col">Appointment date</th>
                <th>Cancel</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)    
            <tr>
                <th scope="row">{{ $booking->id }}</th>
                <td>{{ $booking->appointment_id }}</td>
                <td>{{ $booking->department_name }}</td>
                <td>{{ $booking->appointment_date }}</td>
                <td>
                    <form method="POST" action="{{ route('cancelBooking') }}">
                        @csrf
                        <input type="text" style="display:none;" value="{{ $booking->id }}" name="booking_id"/>
                        <input type="text" style="display:none;" value="{{ $booking->appointment_id }}" name="appointment_id"/>
                        <input type="submit" value="cancel" class="btn btn-danger" />
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>


@endsection('content')