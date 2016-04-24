@extends('layouts.master')

<!-- Author form to add authors associated with research papers and posters -->

@section('content')
<h3>Coaching in Leadership and Healthcare 2016: Paper and Poster Application</h3>

<div class="content">
	<p>Please provide information for your research submission (paper or poster) for consideration in the Coaching in
		Leadership and Healthcare 2016 conference. To make a submission, please</ br>
		<ol>
			<li class="bold">All "*" fields are required to submit the form.</li>
			<li class="bold">Do not use the back button to return to a previous page.</li>
			<li>Select either <span class="red">"PAPER"</span> or <span class="red">"POSTER"</span> for your submission.</li>
			<li>Title field has a maximum of 40 words.</li>
			<li>All other fields, except Abstract, have a minimum of 20 words and maximum of 100 words.</li>
			<li>The Abstract field has a minimum of 20 words and maximum of 150 words.</li>
		</ol>
Once you submit your research, you will be directed to a form to provide information on up to 5 authors.</p>


		@if(count($errors)  > 0)
		  <ul>
		      @foreach ($errors->all() as $error)
		        <li class="bold"><span class="red">{{ $error }}</span></li>
		      @endforeach
		  </ul>
		@endif

		@if(Session::get('message') != null)
	         <div class='flash_message'>{{ Session::get('message') }}</div>
	     @endif
		<!-- Form to gather user data -->

				<form method="POST" id="research_form" action="/research/add">

				<!-- CSRF token for safety -->
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >

				<br>
						<fieldset>
						<legend>Research Information</legend></br>
						<span class="bold">*Please indicate</span> if you are submitting a <span class="bold">PAPER</span> or <span class="bold">POSTER</span>:
						<select form="research_form" name="type" value='{{ old(research->type), ''}}'>
									      <option value=''>SELECT PAPER OR POSTER</option>
												<option value="PAPER">PAPER</option>
												<option value="POSTER">POSTER</option>
        		</select>
						<br>
						<br>
						<span class="bold">*Indicate the track</span> for which you would like your paper/poster to be considered:<br>
						<select form="research_form" name="track" value='{{old(research->track), ''}}'>
									      <option value=''>SELECT A TRACK</option>
												<option value="leader">Leadership and Organizational Coaching--September 16, 2016</option>
                		  	<option value="health">Health, Healthcare and Wellbeing Coaching--September 17, 2016</option>
												<option value="both">Both Sessions--Leadership on September 16 or Healthcare on September 17, 2016</option>
						</select>
						<br>
						<br>
						<span class="bold">*Title</span><br>
						<input type="text" form="research_form" name="title" id="title" size="114" placeholder="Please enter a title" value='{{ old('title') }}' ><br>

						<br>
						<span class="bold">*Background and Objectives</span><br>
						<textarea rows="5" cols="117" name="background" id="background" form="research_form" placeholder="Please provide information in 100 words or less." value='{{ old('background') }}' >{{ old('background') }}</textarea><br>

						<br>
						<span class="bold">*Design and Methods</span><br>
						<textarea rows="5" cols="117" name="design" id="design" form="research_form" value='{{ old('design') }}' placeholder="Please provide information in 100 words or less.">{{ old('design') }}</textarea><br>

						<br>
						<span class="bold">*Findings</span><br>
						<textarea rows="5" cols="117"  name="findings" id="findings" value='{{ old('findings') }}' form="research_form" placeholder="Please provide information in 100 words or less.">{{ old('findings') }}</textarea><br>

						<br>
						<span class="bold">*Discussion</span><br>
						<textarea rows="5" cols="117" name="discussion" id="discussions" value='{{ old('discussion', '') }}' form="research_form" placeholder="Please provide information in 100 words or less.">{{ old('discussion', '') }}</textarea><br>

						<br>
						<span class="bold">*Abstract</span><br>
						<textarea rows="7" cols="117" name="abstract" id="abstract" value='{{ old('abstract', '') }}' form="research_form" placeholder="Please provide information in 150 words or less.">{{ old('abstract', '') }}</textarea><br>

						</fieldset>

				<br>
				<input type ="submit" value="SUBMIT">
				</form>
</div>
@stop
