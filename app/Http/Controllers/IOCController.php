<?php

namespace ioc\Http\Controllers;

use DB;
use Auth;
use Session;

use ioc\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class IOCController extends Controller {

	public function _construct() {
	   # Put anything here that should happen before any of the other actions
	}

	/**
	* Responds to request to show randomly generated data
	*/


	public function getEligibility() {
		return view('eligibility');
	}

	public function getPoster() {
		return view('poster');
	}

	public function getPaper() {
		return view('paper');
	}

	public function getGuidelines() {
		return view('guidelines');
	}

	public function getInformation() {
		return view('information');
	}

	public function getCreateResearch() {
		//need to add send all users here and redirect to research.add if they do not have an entry
		//If there is an entry, pass queried data to view research.show
		$user = \Auth::user();

		if(is_null($user))
			redirect ('/login');

		$count = \ioc\Research::where('user_id', '=', $user->id)->count();
		$research = \ioc\Research::where('user_id', '=', $user->id)->get();

		if ($count === 0)
				{
						\Session::flash('message', 'Thank you for participating in the Coaching Research Session. Please make a new submission by completing the form below.');
						return view('research.add');
				}
		elseif ($count < 2)
				{
				for ($i=0; $i < $count; $i++)
							{
							$countAuthor = \ioc\Author::where('research_id', '=', $research[$i]['id'])
													->where('type', '=', 'P')->count();

							if ($countAuthor === 0)
								{
									return redirect('author/add')->with('research_id', $research[$i]['id']);
									}
								}
							return view('research.add');
					}
			else
					{
					$authors [] = \ioc\Author::where('research_id', '=', $research['0']->id)->get();
					$authors [] = \ioc\Author::where('research_id', '=', $research['1']->id)->get();

			 		\Session::flash("message", "You have reached the 'two-entries' limit per primary author and have been redirected to your submissions.");
			  	return redirect('research/show')->with(['research' => $research, 'authors' => $authors, 'count' => $count]);
					}
 }


	public function postCreateResearch(Request $request) {

		$user = \Auth::user();

		if(is_null($user))
			redirect ('/login');


		$this->validate(
		   $request,
		   [
					'title' => 'required|min:10',
					'background' => 'required|min:20',
					'design' => 'required|min:20',
					'discussion'  => 'required|min:20',
					'findings'  => 'required|min:20',
					'impact'  => 'required|min:20',
					'abstract'  => 'required|min:20'
		   ]
		);


		//Code to enter research paper or poster into database table
				$research = new \ioc\Research();
				$research->type = $request->type;
				$research->track = $request->track;
				$research->title = $request->title;
				$research->user_id = $user->id;
				$research->background = $request->background;
				$research->findings = $request->findings;
				$research->design = $request->design;
				$research->discussion = $request->discussion;
				$research->impact = $request->impact;
				$research->abstract = $request->abstract;
				$research->poster = 0;

				$research->save();

				$research_id = $research->id;

				session(['research_id' => $research_id]);
					return view('/authors/add')->with('research_id', $research_id);

	}

	public function getCreateAuthors(Request $request) {

		$user = \Auth::user();
			$research_id =$request->research['id'];


		if(is_null($user))
			redirect ('/login');
		else
				session(['research_id' => $request->research_id]);


				return view('authors/add')->with('research_id', $research_id);
	}

	public function postCreateAuthors(Request $request) {

		$user = \Auth::user();

		$this->validate(
		   $request,
		   [
	 			 	'first1' => 'required|min:2',
					'last1' => 'required|min:3',
					'organization1' => 'required|min:3',
					'email1'  => 'required|email',
		   ]
		);
		$author = \ioc\Author::where('research_id', '=', $request->research_id)->count();

		if ($author == 0)
		{
				for($i=1; $i < 5; $i++)
				{
				$author = new \ioc\Author();
				if($i == '1')
					{
			    $author->first_name = $request->first1;
					$author->last_name = $request->last1;
					$author->organization = $request->organization1;
					$author->email = $request->email1;
				 	$author->research_id = $request->research_id;
					$author->type = "P";
					$author->user_id = $user->id;
					}
				else
					{
					 $first = 'first' . $i;
					 $author->first_name = $request->$first;

					 $last = 'last' . $i;
					 $author->last_name = $request->$last;

					 $organization = 'organization' . $i;
					 $author->organization = $request->$organization;

 				 	 $user_id = 'user_id' . $i;
					 $author->user_id = $user->id;

					 $email = 'email' . $i;
					 $author->email = $request->$email;

					 $author->research_id = $request->research_id;
			 		 $author->type = "S";
					}
					 $author->save();
				}
			}

	\Session::flash('message', 'Primary and secondary authors added.');

	$research = \ioc\Research::with('author')->find($request->research_id);
  session(['research' => $research]);

 return redirect('/research/show');
}

public function getShowResearch() {

	$user = \Auth::user();

	if(is_null($user))
		redirect ('/login');

					$count = \ioc\Research::where('user_id', '=', $user->id)->count();
					$researches = \ioc\Research::where('user_id', '=', $user->id)->get();

					if ($count === 0)
					{
						\Session::flash('message', 'ID for Research Not Found. You have been redirected to add a research submission.');
						return redirect('research/add');
					}
					else
					{
						for ($i=0; $i < $count; $i++)
						{
							$countAuthors = \ioc\Author::where('research_id', '=', $researches[$i]['id'])->count();
							$research_id =  $researches[$i]['id'];
							if ($countAuthors === 0)
									{
										\Session::flash('message', 'You have been redirected to add authors for your research submission.');
										return redirect('/authors/add')->with('research_id');
									}
								$authors[$i] = \ioc\Author::where('research_id', '=', $research_id)->get();
						 }
						}

				session(['researches' => $researches, 'authors' => $authors, 'count' => $count]);
		  	return view('research.show')->with(['researches' => $researches, 'authors' => $authors, 'count' => $count]);
}

public function postShowResearch(Request $request) {

	$user = \Auth::user();
	if(is_null($user))
		redirect ('/login');

		$countResearch = \ioc\Research::where('user_id', '=', $user->id)->count();
		if ($countResearch === 0)
		{
			\Session::flash('message', 'ID for Research Not Found. You have been redirected to add a research submission.');
			return redirect('research/add');
		}
		else
		{
			for ($i=0; $i <= $countResearch; $i++)
			{
				$researches = \ioc\Research::where('user_id', '=', $user->id)->get();
				$countAuthors = \ioc\Author::where('research_id', '=',  $researches[0]['id'])->count();

				if ($countAuthors === 0)
						{
							$research_id =  $researches[0]['id'];
							\Session::flash('message', 'You have been redirected to add authors for this research submission.');
						return redirect('/authors/add')->with('research_id');
						}
							$authors[$i] = \ioc\Author::where('research_id', '=', $researches[0]['id'])->get();
				 }
			 }

	session(['researches' => $researches, 'authors' => $authors]);
	return redirect('/research/edit')->with(['researches' => $researches, 'authors' => $authors]);
}


public function getEditResearch(Request $request) {

			$user = \Auth::user();
			if(is_null($user))
				redirect ('/login');

			$count = \ioc\Author::where('email', '=', $user->email)->count();
			$author = \ioc\Author::where('email', '=', $user->email)->get();

			if ($author->isEmpty())
					{
						\Session::flash('message', 'ID for Research Not Found');
						return redirect('/research/add');
					}
			else
						{
							$authors = \ioc\Author::where('research_id', '=', $author['0']['research_id'])->get();
							$researches = \ioc\Research::where('id', '=', $author['0']['research_id'])->get();
							session(['researches' => $researches, 'authors' => $authors]);
							if ($researches->isEmpty())
									{
										\Session::flash('message', 'ID for Research Not Found');
										return redirect ('/research/add');
									}
					   }

			return view('research.edit')->with(['researches' => $researches, 'authors' => $authors]);
}


	public function postEditResearch(Request $request) {

		$user = \Auth::user();
		if(is_null($user))
			redirect ('/login');

		$research = session('research');

		if(is_null($request)) {
		\Session::flash('message', 'Research Entry Not Found');
		return redirect('research/add');
		}

		$this->validate(
			 $request,
			 [
					'title' => 'required|min:10',
					'background' => 'required|min:40',
					'design' => 'required|min:40',
					'discussion'  => 'required|min:40',
					'impact'  => 'required|min:40',
					'abstract'  => 'required|min:40'
			 ]
		);

			//Code to enter edited research paper or poster data into database table
			$research = \ioc\Research::find($request->research_id);
			$research->type = $request->type;
			$research->track = $request->track;
			$research->title = $request->title;
			$research->user_id = \Auth::id();
			$research->background = $request->background;
			$research->findings = $request->findings;
			$research->design = $request->design;
			$research->discussion = $request->discussion;
			$research->impact = $request->impact;
			$research->abstract = $request->abstract;
			$research->poster = 0;
			$research->save();

			for($i= '1'; $i < 5; $i++)
				{
					$id = 'id' . $i;
					if (!is_null($request->$id))
						{
						$author = \ioc\Author::find($request->$id);

						$first = 'first' . $i;
						$author->first_name = $request->$first;

						$last = 'last' . $i;
		  			$author->last_name = $request->$last;

						$user_id = 'user_id' . $i;
 					  $author->user_id = $user->id;

						$organization = 'organization' . $i;
						$author->organization = $request->$organization;

						$email = 'email' . $i;
						$author->email = $request->$email;

					  $author->save();
				 		}
				}
				$research = \ioc\Research::with('author')->find($request->research_id);
				session(['research' => $research]);
			  return redirect('/research/show');
	}


	public function getConfirmDelete(Request $request) {

		$user = \Auth::user();
		if(is_null($user))
			redirect ('/login');

		$count = \ioc\Author::where('email', '=', $user->email)->count();
		$author = \ioc\Author::where('email', '=', $user->email)->get();

		if ($author->isEmpty())
				{
					\Session::flash('message', 'No research entries found to delete. You have been redirected to add an entry.');
					return redirect('research/add');
				}
		else
					{
						for ($i=0; $i < $count; $i++)
						{
							$research_id = $author[$i]->research_id;
							$authors[$i] = \ioc\Author::where('research_id', '=', $research_id)->get();
							$researches[$i] = \ioc\Research::where('id', '=', $research_id)->get();
						}
						session(['researches' => $researches, 'authors' => $authors, 'count' => $count]);
						if (is_null($researches))
								{
									\Session::flash('message', 'ID for Research Not Found');
									return redirect ('research/add');
								}
					 }

return view('research/delete')->with(['researches' => $researches, 'authors' => $authors, 'count' => $count]);
}


	public function postDoDelete(Request $request) {

				$research_id = $request->research_id;
				dump($research_id);

				#remove authors first
				$submission = \ioc\Research::find($research_id);
				$authors = \ioc\Author::where('research_id', '=', $research_id);


				$authors->delete();
				$submission->delete();

		return view('research.add');
	}


}
