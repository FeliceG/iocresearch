@extends('layouts.master')


<!-- Author form to add authors associated with research papers and posters -->


@section('content')

<div class="content">

<h3>Coaching in Leadership and Healthcare 2016: Poster Application</h3>

<p>Please provide information for the primary and secondary authors for your ressearch submission. Information for
the Primary Author is required; Secondary Author information is optional.</p>
<br>

@if(count($errors)  > 0)
  <ul>
      @foreach ($errors->all() as $error)
        <li class="bold">{{ $error }}</li>
      @endforeach
  </ul>
@endif

@if(Session::get('message') != null)
       <div class='flash_message'>{{ Session::get('message') }}</div>
   @endif

<!-- Form to gather user data -->

<div id="readroot" style="display: none">


</div>

<form method="POST" id="authorform" action="/authors/add">

<!-- CSRF token for safety -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" >

    <input type="hidden" form="authorform" name="research_id" value=" {{ session('research_id') }}  " >

    <fieldset>
        <legend>Primary Author Contact Information</legend>
        <label>Name: &nbsp; </label>{{ Auth::user()->first }} {{ Auth::user()->last }}
          <input type="hidden"
            form="authorform"
            id="first1"
            name="first1"
            placeholder="First Name"
            size="30"
            value="{{ Auth::user()->first }}">&nbsp;&nbsp;&nbsp;
          <input type="hidden"
            form="authorform"
            id="last1"
            name="last1"
            placeholder="Last Name"
            size="40"
            value='{{ Auth::user()->last }}'>&nbsp;&nbsp; >

        <label>Organization: &nbsp; </label>{{ Auth::user()->organization }}
          <input type="hidden"
            form="authorform"
            id="organization1"
            name="organization1"
            placeholder="Institutional Affiliation"
            size="45"
            value='{{ Auth::user()->organization }}' >&nbsp;&nbsp; >

         <label>Email: &nbsp; </label>{{ Auth::user()->email }}
          <input type="hidden"
            form="authorform"
            id="email1"
            name="email1"
            size="30"
            placeholder="Email"
            value='{{ Auth::user()->email }}' >&nbsp;&nbsp; >
    </fieldset>
<br>
<fieldset>
  <legend>Secondary Author One</legend>
    <label>*First Name:</label>
    <input type="text"
      form="authorform"
      id="first2"
      name="first2"
      placeholder="First Name"
      value='{{ old('first2', '') }}'>&nbsp;&nbsp;&nbsp; >

  <label>*Last Name:</label>
    <input type="text"
      form="authorform"
      id="last_name2"
      name="last2"
      size="35"
      placeholder="Last Name"
      value='{{ old('last2', '') }}'>&nbsp;&nbsp;&nbsp; >
<br>
  <label>*Organization:</label>
    <input type="text"
      form="authorform"
        id="organization2"
        name="organization2"
        size="55"
        placeholder="Institutional Affiliation"
        value='{{ old('organization2', '') }}'>&nbsp;&nbsp;&nbsp; >

  <label>*Email:</label>
    <input type="email"
      form="authorform"
      id="email2"
      name="email2"
      size="35"
      placeholder="Email"
      value='{{ old('email2', '') }}' >&nbsp;&nbsp;&nbsp;>

</fieldset>
<br>
<fieldset>
  <legend>Secondary Author Two</legend>
    <label>*First Name:</label>
    <input type="text"
      form="authorform"
      id="first3"
      name="first3"
      placeholder="First Name"
      value='{{ old('first3', '') }}'>&nbsp;&nbsp;&nbsp; >

  <label>*Last Name:</label>
    <input type="text"
      form="authorform"
      id="last_name3"
      name="last3"
      size="35"
      placeholder="Last Name"
      value='{{ old('last3', '') }}'>&nbsp;&nbsp;&nbsp;  >
<br>
  <label>*Organization:</label>
    <input type="text"
      form="authorform"
        id="organization3"
        name="organization3"
        size="55"
        placeholder="Institutional Affiliation"
        value='{{ old('organization3', '') }}'>&nbsp;&nbsp;&nbsp;  >

  <label>*Email:</label>
    <input type="email"
      form="authorform"
      id="email3"
      name="email3"
      size="35"
      placeholder="Email"
      value='{{ old('email3', '') }}' >&nbsp;&nbsp;&nbsp;  >
</fieldset>
<br>

<fieldset>
  <legend>Secondary Author Three</legend>
    <label>*First Name:</label>
    <input type="text"
      form="authorform"
      id="first4"
      name="first4"
      placeholder="First Name"
      value='{{ old('first4', '') }}'>&nbsp;&nbsp;&nbsp;  >

  <label>*Last Name:</label>
    <input type="text"
      form="authorform"
      id="last_name4"
      name="last4"
      size="35"
      placeholder="Last Name"
      value='{{ old('last4', '') }}'>&nbsp;&nbsp;&nbsp;  >
<br>
  <label>*Organization:</label>
    <input type="text"
      form="authorform"
        id="organization4"
        name="organization4"
        size="55"
        placeholder="Institutional Affiliation"
        value='{{ old('organization4', '') }}'>&nbsp;&nbsp;&nbsp;  >

  <label>*Email:</label>
    <input type="email"
      form="authorform"
      id="email4"
      name="email4"
      size="35"
      placeholder="Email"
      value='{{ old('email4', '') }}' >&nbsp;&nbsp;&nbsp;  >
</fieldset>
<br>

<fieldset>
  <legend>Secondary Author Four</legend>
    <label>*First Name:</label>
    <input type="text"
      form="authorform"
      id="first5"
      name="first5"
      placeholder="First Name"
      value='{{ old('first5', '') }}'>&nbsp;&nbsp;&nbsp;  >

  <label>*Last Name:</label>
    <input type="text"
      form="authorform"
      id="last_name5"
      name="last5"
      size="35"
      placeholder="Last Name"
      value='{{ old('last5', '') }}'>&nbsp;&nbsp;&nbsp;  >
<br>
  <label>*Organization:</label>
    <input type="text"
      form="authorform"
        id="organization5"
        name="organization5"
        size="55"
        placeholder="Institutional Affiliation"
        value='{{ old('organization5', '') }}'>&nbsp;&nbsp;&nbsp;  >

  <label>*Email:</label>
    <input type="email"
      form="authorform"
      id="email5"
      name="email5"
      size="35"
      placeholder="Email"
      value='{{ old('email5', '') }}' >&nbsp;&nbsp;&nbsp;  >
</fieldset>
<br>
            <input id="submit-btn" type ="submit" value="SUBMIT">
            </form>
            <br>
            <br>
   </div>  <!-- content -->

@stop
