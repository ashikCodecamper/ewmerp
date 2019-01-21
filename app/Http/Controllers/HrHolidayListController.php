<?php

namespace App\Http\Controllers;

use App\HrHolidayList;
use Illuminate\Http\Request;
use Session;

class HrHolidayListController extends Controller
{
    //showing the calendar page

    public function just_show()
    {
        return view('hr.holiday.holiday_calendar1');
    }

    //json events for calendar

    public function index()
    {
        $events = HrHolidayList::all();

        $events_data = [];

        foreach ($events as $event) {
            $events_data[] = [
              'id'          => $event->id,
              'title'       => $event->title,
                'start'     => $event->start,
                'end'       => $event->end,
                'className' => $event->className,
            ];
        }

        return json_encode(['events' => $events_data]);
    }

    //saving the holiday event in database

    public function saveholiday(Request $request)
    {
        $data = $request->get('data');
        $b = json_decode($data, true);

        $hr = new HrHolidayList();

        $hr['title'] = $b['title'];
        $hr['start'] = $b['start'];
        $hr['end'] = $b['end'];
        $hr['className'] = $b['className'];

        $hr->save();
    }

    //edit the holiday event in database
    public function editholiday(Request $request)
    {
        $event = $request->get('event');

        $b = json_decode($event, true);

        $e = HrHolidayList::find($b['id']);

        $e['title'] = $b['title'];

        $e->save();
    }

    //delete the holiday

    public function deleteholiday(Request $request)
    {
        $event = $request->get('event');
        $b = json_decode($event, true);

        $e = HrHolidayList::find($b['id']);
        $e->delete();
    }

    /*
    public function create()
    {
        return view('hr.holiday.create');
    }


    public function store(Request $request)
    {
        HrHolidayList::create([
          'holiday_name' => $request->holiday_name,
          'start_date' => $request->start_date,
          'end_date' => $request->end_date
        ]);
        Session::flash('success', 'Successfully Created!');
        return redirect()->route('holidaylist.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $holiday = HrHolidayList::find($id);
        return view('hr.holiday.edit',['holiday'=>$holiday]);
    }


    public function update(Request $request, $id)
    {
            $holiday = HrHolidayList::find($id);
            $holiday->holiday_name = $request->holiday_name;
            $holiday->start_date = $request->start_date;
            $holiday->end_date = $request->end_date;
            $holiday->save();
            Session::flash('success', 'Successfully Updated!');
            return redirect()->route('holidaylist.index');
    }

    public function destroy($id)
    {
      HrHolidayList::destroy($id);
      Session::flash('success', 'Successfully Deleted!');
      return redirect()->route('holidaylist.index');
    }*/
}
