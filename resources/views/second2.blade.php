@extends('layouts.master')

<!-- Secondary Author form to add secondary authors associated with research papers and posters -->


@section('content')
<h1>Coaching in Leadership and Healthcare 2016: Poster Application</h1>

<div class="content">
<p>Please provide information for any additional authors who contributed to the research presented in the poster or paper to be submitted for the Coaching in Leadership and Healthcare 2016 conference, scheduled September 16-17, 2016.</p>

<!-- Form to gather user data -->

<br>

<form method="POST" class="input-append" id="secondform" action="/show">
<ul class="list">

<!-- CSRF token for safety -->
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >

<fieldset id="second_authors">
<br>

<input type="hidden" name="count" value="1" />
<div class="control-group" id="fields">
<div class="controls" id="profs">

<legend>Secondary Authors Contact Information</legend>
<div class="row">
<div id="field">
<br>
First Name: <div id="field1"><input type="text" id="second_first1" name="second_first1" placeholder="First Name">&nbsp;&nbsp;&nbsp;</div>
<br>
Last Name: 
<div id="field2"><input type="text" id="second_last1" name="second_last1" placeholder="Last Name">&nbsp;&nbsp;&nbsp;</div>
<br>
Institutional Affiliation: 
<div id="field3"><input type="text" id="second_institution1" name="second_institution1" placeholder="Institutional Affiliation">&nbsp;&nbsp;&nbsp;</div>
<br>
Email Address:
<div id="field4"><input type="email" id="second_email1" name="second_email1" placeholder="Email">&nbsp;&nbsp;&nbsp;</div>
<button id="b1" class="btn add-more" type="button">+</button></div>
<br>
<small>Press + to add another secondary author</small>
</div>  <!-- row -->
</div>  <!-- controls -->
</div>  <!-- control-group -->
</fieldset>

<br>
<br>
<input type ="submit" value="SUBMIT">
</form>
   </div>  <!-- content -->
@stop

