@extends('layouts.master')
<div id="left">
</div>

<!-- Take content generated by FakerController from form input and generate into a view -->


<div id="center">

<!-- Output lorem ipsum data -->

@section('content')
    <h2> Randomly-Generated User Information</h2>
    <h3 class="header3">Lorem Ipsum:</h3>
	@foreach($lists as $list)
		{{ $list }} <br><br>
	@endforeach

<!-- Output user data, if requested via form -->

	@if(isset($users))
   	<h3 class="header3">User Information:</h3>
   	
   	<!-- Output user name, for requested number of users -->
   	
   	@foreach($users as $user)
   	      Name:&nbsp;&nbsp;{{ $user['name'] or '' }} <br>
   	      
   	<!-- Output user birthdate, email, bio, if requested via form -->
   	      
   	      @if(isset($user['birthdate'])) 
   	        Birthdate:&nbsp;&nbsp;{{ $user['birthdate'] or '' }} <br> 
   	      @endif
   	      @if(isset($user['email']))
   	        Email:&nbsp;&nbsp;{{ $user['email'] or '' }} <br> 
   	      @endif
   	      @if(isset($user['bio']))
   	        Biography:&nbsp;&nbsp;{{ $user['bio'] or '' }} <br>
   	      @endif
   	      <br>
	@endforeach

	@endif
@stop
</div>

<div id="right">
</div>

