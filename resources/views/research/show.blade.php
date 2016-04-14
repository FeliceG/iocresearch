@extends('layouts.master')

<!-- Author form to add authors associated with research papers and posters -->


@section('content')



<div class="content">
	<h2>Coaching in Leadership and Healthcare 2016 Submissions</h2>

	<p>Thank you for your research submission(s) for consideration in the Coaching in Leadership and Healthcare 2016 conference, scheduled September 16-17, 2016.
	Your submission is listed below. To make changes to your submission, select the button next to your entry and click the "Edit" button below.</p>

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
				<form method="POST" id="research_form" action="/research/show">

				<!-- CSRF token for safety -->

				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
				<input type="hidden" name="research_id" value=" {{ session('researches[id]') }}  " >

		<br>

	  			@for ($i = 0; $i < $count; $i++)
							<fieldset>
								<legend><span class="bold"><input type="radio" name="research_id" value=" {{ $researches[$i]->id  }}  " >&nbsp; &nbsp;Select This Research Submission To Edit</span></legend>
													<span class="bold">Your submission is for a research:</span> {{ $researches[$i]->type }}<br>
													<span class="bold">Title:</span> {{ $researches[$i]->title }} <br>
													<span class="bold">Track:</span> {{ $researches[$i]->track }} <br><br>
													<span class="bold">Background and Objectives:</span> {{ $researches[$i]->background }} <br><br>
													<span class="bold">Design and Methods:</span> {{ $researches[$i]->design }} <br><br>
													<span class="bold">Findings:</span> {{ $researches[$i]->findings }} <br><br>
													<span class="bold">Discussion:</span> {{ $researches[$i]->discussion }} <br><br>
													<span class="bold">Impact on Coaching Practice: </span>{{ $researches[$i]->impact }} <<br><br>
											  	<span class="bold">Abstract:</span> {{ $researches[$i]->abstract }} <br><br>
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


				<br>
				<input type ="submit" value="EDIT">
				</form>
</div>
@stop
