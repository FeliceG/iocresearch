<?php

namespace ioc;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    //

	public function author() {
	   return $this->hasMany('\ioc\Author');
	}

	public function user() {
		return $this->belongsTo('\ioc\User');
	}



	public function getResearch()  {

		$user = \Auth::user();
			dump($user);
		$author = \ioc\Author::where('email', '=', $user->email)->get()->toArray();
		dump($author);
		$research_id = $author['0']['research_id'];
		echo 'research_id is: ' . $research_id;
		$research = \ioc\Research::with('author')->where('id', '=', $research_id)->get()->toArray();

		return $research;

	}

	public function saveResearch()  {

		$research = new \ioc\Research();
		$research->type = $request->paper_poster;
		$research->track = $request->track;
		$research->title = $request->title;
		$research->user_id = \Auth::id();
		$research->background = $request->background;
		$research->findings = $request->findings;
		$research->design = $request->design;
		$research->discussion = $request->discussion;
		$research->impact = $request->impact;
		$research->abstract = $request->abstract;

		$research->save();

		return $research;

	}
}
