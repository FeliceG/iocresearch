@extends('layouts.master')

<!-- Author form to add authors associated with research papers and posters -->


@section('content')


<h1>Coaching in Leadership and Healthcare 2016: Poster Application</h1>

<div class="content">
	<p>To delete your submission for consideration in the Coaching in Leadership and Healthcare 2016 conference,
		click the "DELETE" button below to confirm you would like to continue with the delete process.</p>

		@if(count($errors)  > 0)
		  <ul>
		      @foreach ($errors->all() as $error)
		        <li>{{ $error }}</li>
		      @endforeach
		  </ul>
		@endif

		@if(Session::get('message') != null)
	         <div class='flash_message'>{{ Session::get('message') }}</div>
	     @endif

		<!-- Form to gather user data -->

		<br>

				<form method="POST" id="delete_form" action="/research/delete">

				<!-- CSRF token for safety -->
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
				<input type="hidden" name="research_id" value=" {{ session('research[id]') }}  " >

				<br>
				@for ($i = 0; $i < $count; $i++)
					<fieldset>
						<legend><span class="bold"><input type="radio" name="research_id" value=" {{ $researches[$i]['0']->id  }}  " >&nbsp; &nbsp;Select This Research Submission To Delete</span></legend>
											<span class="bold">Your submission is for a research:</span> {{ $researches[$i]['0']->type }}<br>
											<span class="bold">Title:</span> {{ $researches[$i]['0']->title }} <br>
											<span class="bold">Track:</span> {{ $researches[$i]['0']->track }} <br>
											<span class="bold">Background and Objectives:</span> {{ $researches[$i]['0']->background }} <br>
											<span class="bold">Design and Methods:</span> {{ $researches[$i]['0']->design }} <br>
											<span class="bold">Findings:</span> {{ $researches[$i]['0']->findings }} <br>
											<span class="bold">Discussion:</span> {{ $researches[$i]['0']->discussion }} <br>
											<span class="bold">Impact on Coaching Practice: </span>{{ $researches[$i]['0']->impact }} <<br>
											<span class="bold">Abstract:</span> {{ $researches[$i]['0']->abstract }} <br>
							<br>
													<legend><span class="bold">Authors</span></legend>
																			@for ($n = 0; $n < 4; $n++)
																			<span class="bold">Name:</span> {{ $authors[$i][$n]->first_name }} {{ $authors[$i][$n]->last_name }}<br>
																			<span class="bold">Organization:</span> {{ $authors[$i][$n]->organization }}<br>
																			<span class="bold">Email:</span> {{ $authors[$i][$n]->email }}<br>
																			<br>
																			@endfor

											</fieldset>
											<br>
					@endfor


				<br>
				<input type ="submit" value="DELETE">
				</form>
</div>
@stop
