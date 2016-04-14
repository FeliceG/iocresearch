@extends('layouts.master')

<!-- Author form to add authors associated with research papers and posters -->




<div class="container">

@section('content')
<h1>Coaching in Leadership and Healthcare 2016: Poster Application</h1>

<div class="content">
<p>Please provide information for your research submission (paper or poster) for consideration in the Coaching in Leadership and Healthcare 2016 conference, scheduled September 16-17, 2016. After providing the requested information for your research paper or poster, you'll be directed to the form to input author information.</p>
<p>The research sessions are held to exchange information, ideas, and the latest research results in the field of coaching. Papers and posters need to be relevant to the following areas:<br>
	<ul>
		<li>Leadership Coaching</li>
		<li>Healh and Wellness Coaching</li>
		<li>Positive Psychology</li>
		<li>Life Coaching</li>
		<li>Other relevant fields</li>
	</ul>
</p>

<p>Papers and posters can descrie original empirical research (quantitative, qualitative or mixed-methods research), meta-analyses, and theoretical discussions.</p>
<p>Each author can submit <span class="bold">up to two different submissions</span> of paper and/or posters.<br>
	<ul>
		<li>Primary authors must be investigators who are currently affiliated with academic institutions, OR are doctoral level professionals (PhD, MD, EdD) in other
			institutions, OR are graduate students and other professionals with doctoral level mentors.</li>
		<li>Empirical research should be completed or well under way rather than at the beginning stages. It must include analyses and a summary of findings. Stating
			&#34;the datawil be analyzed&#34; or &#34;findings will be presented/discussed&#34; is not sufficient research to submit for either the poster or paper presentation.</li>
		<li>The submission cannot hae been presented at any previous Institute of Coaching conference.</li>
		<li>The submission cannot have been previously published.</li>
		<li>The study must have followed the standards of ethis in research with human beings and obtained appropriate ethical approval if it is an empirical study.</li>
		<li>The Scientific Advisory Counsil of the Institute of Coaching will review all paper and poster submissions and select those to be presented at the conference as well
			as the winners of the Best Poster Competition and Honorary Mention winners.</li>
		<li class="bold">Submissions that promote commercial interests or that feature proprietary materials will not be accepted.</li>
		<li>Presenting authors of all accepted papers and posters must register and pay the conference registration fee.</li>
	</ul>
	<br>
	Posters will not be considered for poster awards or be displayed without your presence and conference registration of at least one author.</p>

<!-- Form to gather user data -->

<br>
<form method="POST" id="research_form" action="/research/add">

<!-- CSRF token for safety -->
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >


<br>
<fieldset>
<legend>Research Information</legend>
<p>Please indicate if you are submitting a <span class="bold">PAPER</span> or <span class="bold">POSTER</span>:   <select form="research_form" name="paper_poster" value="paper">
			      <option value="paper">PAPER</option>
			      <option value="poster">POSTER</option>
					           </select>
<br>
<p>Indicate the track for which you would like your paper/poster to be considered:   <select form="research_form" name="track" value="select">
			      <option value="select">SELECT A TRACK</option>
						<option value="leadership">Leadership and Organizational Coaching--September 16, 2016</option>
			      <option value="health">Health, Healthcare and Wellbeing Coaching--September 17, 2016</option>
						<option value="both">Both Sessions--Leadership on September 16 or Healthcare on September 17, 2016</option>
					           </select>
<br>
<span class="bold">Title</span><br>
<input type="text" form="research_form" name="title" id="title" size="175" placeholder="Enter title" value='{{old('title', 'Please enter a title') }}' ><br>

<br>
<span class="bold">Background and Objectives</span><br>
<textarea rows="7" cols="120" name="background" id="background" form="research_form" placeholder="Please provide information in 100 words or less." value='{{old('background', 'Please provide Background and Objectives for your research in 100 words or less.') }}' ></textarea><br>

<br>
<span class="bold">Design and Methods</span><br>
<textarea rows="7" cols="120" name="design" id="design" form="research_form" value='{{old('design', 'Please provide Design and Methods for your research in 100 words or less.') }}' placeholder="Please provide information in 100 words or less."></textarea><br>

<br>
<span class-"bold">Findings</span><br>
<textarea rows="7" cols="120"  name="findings" id="findings" value='{{old('findings', 'Please provide Findings for your research in 100 words or less') }}' form="research_form" placeholder="Please provide information in 100 words or less."></textarea><br>

<br>
<span class="bold">Discussion</span><br>
<textarea rows="7" cols="120" name="discussion" id="discussions" value='{{old('discussion', 'Please provide Discussion for your research in 100 words or less') }}' form="research_form" placeholder="Please provide information in 100 words or less."></textarea><br>

<br>
<span class="bold">Impact on Coaching Practice</span><br>
<textarea rows="7" cols="120" name="impact" id="impact" value='{{old('discussion', 'Please provide an explanation on the Impact of your research on Coaching Practice in 100 words or less') }}' form="research_form" placeholder="Please provide information in 100 words or less."></textarea><br>

<br>
<span class="bold">Abstract</class><br>
<textarea rows="7" cols="120" name="abstract" id="abstract" value='{{old('abstract', 'Please provide an abstract in 150 words or less.') }}' form="research_form" placeholder="Please provide information in 150 words or less."></textarea><br>

</fieldset>

<br>
<input type ="submit" value="SUBMIT">
</form>
     </div>
   </div>
@stop
