@if (Session::has('message'))
    <div class="alert {{Session::has('message_important') ? 'alert-danger':'alert-success'}} alert-dismissible"  role="alert">
        <button type="button" class="close close_click" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {!!Session::get('message')!!}
        @if(Session::get('message') == 'Please contact admin to assign a phone number to start communication')
            <a class="btn btn-secondary" href="{{ url('user/tickets/create-new') }}">Click here</a>
        @endif
        {{ Session::forget('message') }}
        {{ Session::save() }}
    </div> 
    @else
@endif

@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close close_click" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@endif

<div class="ajaxerror"></div>

