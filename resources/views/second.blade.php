@extends('layouts.master')

<!-- Secondary Author form to add secondary authors associated with research papers and posters -->


@section('content')
<h1>Coaching in Leadership and Healthcare 2016: Poster Application</h1>

<div class="content">
<p>Please provide information for any additional authors who contributed to the research presented in the poster or paper to be submitted for the Coaching in Leadership and Healthcare 2016 conference, scheduled September 16-17, 2016.</p>

<!-- Form to gather user data -->

<br>

<form method="POST" class="input-append" id="secondform" action="/show">

<!-- CSRF token for safety -->
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >


<input type="hidden" name="id" value='{{ $book->id }}'>

	<br>
<fieldset id="second_authors">
<br>

<input type="hidden" name="count" value="1" />

<legend>Secondary Authors Contact Information</legend>
<input type="text" id="first1" name="first1" placeholder="First Name">&nbsp;&nbsp;&nbsp;
<input type="text" id="last1" name="last1" size="35" placeholder="Last Name">&nbsp;&nbsp;&nbsp;
<input type="text" id="institution1" name="institution1" size="55" placeholder="Institutional Affiliation">&nbsp;&nbsp;&nbsp;
<input type="email" id="email1" name="email1" size="35" placeholder="Email">&nbsp;&nbsp;&nbsp;
<br>
<br>
<input type="text" id="first2" name="first2" placeholder="First Name">&nbsp;&nbsp;&nbsp;
<input type="text" id="last2" name="last2" size="35" placeholder="Last Name">&nbsp;&nbsp;&nbsp;
<input type="text" id="institution2" name="institution2" size="55" placeholder="Institutional Affiliation">&nbsp;&nbsp;&nbsp;
<input type="email" id="email2" name="email2" size="35" placeholder="Email">&nbsp;&nbsp;&nbsp;
<br>
<br>
<input type="text" id="first3" name="first3" placeholder="First Name">&nbsp;&nbsp;&nbsp;
<input type="text" id="last3" name="last3" size="35" placeholder="Last Name">&nbsp;&nbsp;&nbsp;
<input type="text" id="institution3" name="institution3" size="55" placeholder="Institutional Affiliation">&nbsp;&nbsp;&nbsp;
<input type="email" id="email3" name="email3" size="35" placeholder="Email">&nbsp;&nbsp;&nbsp;
<br>
<br>
<input type="text" id="first4" name="first4" placeholder="First Name">&nbsp;&nbsp;&nbsp;
<input type="text" id="last4" name="last4" size="35" placeholder="Last Name">&nbsp;&nbsp;&nbsp;
<input type="text" id="institution4" name="institution4" size="55" placeholder="Institutional Affiliation">&nbsp;&nbsp;&nbsp;
<input type="email" id="email4" name="email4" size="35" placeholder="Email">&nbsp;&nbsp;&nbsp;
<br>
<br>
<input type="text" id="first5" name="first5" placeholder="First Name">&nbsp;&nbsp;&nbsp;
<input type="text" id="last5" name="last5" size="35" placeholder="Last Name">&nbsp;&nbsp;&nbsp;
<input type="text" id="institution5" name="institution5" size="55" placeholder="Institutional Affiliation">&nbsp;&nbsp;&nbsp;
<input type="email" id="email5" name="email5" size="35" placeholder="Email">&nbsp;&nbsp;&nbsp;
<br>
<br>
</fieldset>

<br>
<input id="submit-btn" type ="submit" value="SUBMIT">
</form>
<br>
<br>
   </div>  <!-- content -->
@stop

