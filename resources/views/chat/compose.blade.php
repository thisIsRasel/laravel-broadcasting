@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">History</div>

                <div id="history" class="panel-body" style="height: 300px; overflow-y: auto;">

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">To: {{ $buddy->name }}</div>

                <div class="panel-body">

                    <input type="hidden" id="senderId" value="{{ Auth::user()->id }}" />
                    <input type="hidden" id="receiverId" value="{{ $buddy->id }}" />

                    {{ Form::open(['method'=>'POST', 'url'=>'send_message', 'id'=>'message_form']) }}
                        
                        <input type="hidden" name="buddy_id" value="{{ $buddy->id }}" />
                        <textarea class="form-control" id="message" name="message" rows="4" style="resize: vertical;" placeholder="Type your message..."></textarea>   
                        <br/> 
                        <!--input id="send" type="button" class="btn btn-primary" value="Send"/-->

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>

</div>
@endsection