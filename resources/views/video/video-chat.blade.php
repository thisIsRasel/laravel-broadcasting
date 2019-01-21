<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <div class="content">
           <div class="title m-b-md">
               Video Chat Rooms
           </div>

           {!! Form::open(['url' => 'room/create']) !!}
               {!! Form::label('roomName', 'Create or Join a Video Chat Room') !!}
               {!! Form::text('roomName') !!}
               {!! Form::submit('Go') !!}
           {!! Form::close() !!}

           @if($rooms)
           @foreach ($rooms as $room)
               <a href="{{ url('/room/join/'.$room) }}">{{ $room }}</a>
           @endforeach
           @endif
        </div>
    </body>
</html>
