@extends('layouts.app')
@section('content')

    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                <div class="clockStyle" id="clock">123</div>
            </div>

            <div class="links">
                <a href="{{asset('/attendance/assign')}}">Attendance</a>
                <a href="#"></a>
                <a href="#"></a>
                <a href="{{asset('/leave/assign')}}">Leave</a>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script type="text/javascript">
        setInterval(displayclock, 500);

        function displayclock() {
            var time = new Date();
            var hrs = time.getHours();
            var min = time.getMinutes();
            var sec = time.getSeconds();
            var en = 'AM';
            if (hrs > 12) {
                en = 'PM';
            }
            if (hrs > 12) {
                hrs = hrs - 12;
            }
            if (hrs == 0) {
                hrs = 12;
            }
            if (hrs < 10) {
                hrs = '0' + hrs;
            }
            if (min < 10) {
                min = '0' + min;
            }
            if (sec < 10) {
                sec = '0' + sec;
            }
            document.getElementById("clock").innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;
        }
    </script>
@endsection