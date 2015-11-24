<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Photo;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\EventRepository;
use DB;
use Storage;
use Auth;

class EventController extends Controller
{
    /**
     * The event repository instance.
     *
     * @var EventRepository
     */
    protected $events;

    /**
     * Create a new controller instance.
     *
     * @param EventRepository $events
     */
    public function __construct(EventRepository $events)
    {
        $this->middleware('auth');
        $this->events = $events;
    }

    /**
     * Display a list of all of the user's events.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $events = $this->events->findAllEventsForUser($request->user());
        foreach ($events as &$event){

        }
        return view('events.index', [
            'events' => $events,
        ]);
    }

    /**
     * Display a list of events which match the keyword
     *
     * @param Request $request
     * @param string $key
     * @param string $value
     * @return Response
     */
    public function findKeyWord(Request $request, $key, $value)
    {
        $queryStr = 'select * from lm_events where user_id = ? && ' . $key . ' = ?';
        return view('events.index', [
            'events' => DB::select($queryStr, [Auth::user()->id, $value])
        ]);
    }

    /**
     * Create a new event.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $event_id = $request->user()->events()->create([
            'time' => $request->time,
            'name' => $request->name,
            'detail' => $request->detail,
            'friend' => $request->friend,
            'mood' => $request->mood,
            'weather' => $request->weather,
            'location' => $request->location,
            'label' => $request->label,
        ])->id;

        if ($request->hasFile('photo')) {
            $photos = $request->file('photo');
            foreach($photos as $photo)
            {
                $dir = 'users/' . Auth::user()->name . '/';
                $newFileName = md5(time() . rand(0, 10000)) . '.' . $photo->getClientOriginalExtension();
                $savePath = $dir . $newFileName;
                Storage::put(
                    $savePath,
                    file_get_contents($photo->getRealPath())
                );
                DB::insert('insert into lm_photos (event_id, url) values (?, ?)', [$event_id, $savePath]);
            }
        } else {
            $savePath = '';
        }

        return redirect('/events');
    }

    /**
     * Destroy the given event.
     *
     * @param Request $request
     * @param Event $event
     * @return Response
     */
    public function destroy(Request $request, Event $event)
    {
        $this->authorize('destroy', $event);
        $event->delete();
        return redirect('/events');
    }
}
