<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

	protected $fillable = ['title','content', 'time', 'location'];

	/**
     * lấy tất cả events
     * 
     * @return [type] [description]
     */
    public static function getAll() {
    	return Event::get();
    }

    /**
     * luu du lieu
     * 
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function store($data) {
    	$event = new Event;
    	$event->title = $data['title'];
    	$event->content = $data['content'];
    	$event->time = $data['time'];
    	$event->location = $data['location'];
    	$event->save();
    	return $event;
    }
}
