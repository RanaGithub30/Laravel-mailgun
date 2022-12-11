<html>
    <body>
    @if(Session::has('user_ermail'))
    @php
      $mail = Session::get('user_ermail');
    @endphp

        <p>Welcome to the Weloin Technologies. <a href="{{route('user-welcome-email', ['mail' => $mail])}}" target="_blank" >Please Click Here</a></p>
    @endif
    </body>
</html>