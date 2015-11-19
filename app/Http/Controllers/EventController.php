<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\EventRepository;
use DB;

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
     * @return void
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
        /**
         * Use SQL raw query
         *
         * return view('events.index', [
         * 'events' => DB::select('select * from lm_events where user_id = ?', [$request->user()->id])
         * ]);
         */

        /**
         * Recommended usage in laravel quickstart guide
         */
        return view('events.index', [
            'events' => $this->events->forUser($request->user()),
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

        $request->user()->events()->create([
            'time' => $request->time,
            'name' => $request->name,
            'detail' => $request->detail,
            'friend' => $request->friend,
            'mood' => $request->mood,
            'weather' => $request->weather,
            'location' => $request->location,
            'label' => $request->label,
        ]);

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
