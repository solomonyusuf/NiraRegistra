@extends('shared.layout')
@section('body')
    <?php
    $list = \App\Models\ForumResource::orderBy('created_at', 'DESC')->get();
    $schedules = \App\Models\Schedule::where([
        'month_id' => $month->id
    ])->get();
    ?>
    <div class="row">
        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
                        <i class="tf-icons bx bx-calendar me-1"></i>
                        <span class="d-none d-sm-block"> Calender </span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages" aria-selected="false" tabindex="-1">
                        <i class="tf-icons bx bxs-calendar-event me-1"></i>
                        <span class="d-none d-sm-block"> Events</span>
                    </button>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">

                    <div class=" app-calendar-wrapper mb-5">
                        <div class="row g-0">
                            <!-- Calendar Sidebar -->
                            <div class="col app-calendar-sidebar" id="app-calendar-sidebar">
                                <div class="border-bottom p-4 my-sm-0 mb-3">
                                    <div class="d-grid">
                                        <button class="btn btn-success btn-toggle-sidebar" data-bs-toggle="offcanvas" data-bs-target="#addEventSidebar" aria-controls="addEventSidebar">
                                            <i class="bx bx-plus me-1"></i>
                                            <span class="align-middle">Add Event</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h4 class="mb-4 text-center">
                                        <span class="badge bg-success">
                                            {{ \Illuminate\Support\Str::upper($month->name.' '.'Events')}}
                                        </span>
                                    </h4>
                                    <ul style="list-style-type:none; ">
                                        @if(!$schedules)
                                            <p class="mb-3">
                                                No Schedules
                                            </p>
                                        @endif
                                        @foreach($schedules as $schedule)
                                            <li class="mb-3" style="border:solid;padding:15px;border-width:1px;">
                                                <span class="badge bg-{{$schedule->tag}} mb-3">{{\App\Models\Day::find($schedule->days_id)?->day}}</span>
                                                <span class="mb-3 text-center"><b>{{$schedule->title}}</b></span><br>
                                                <span class="mb-3 text-center">{{\Carbon\Carbon::parse($schedule->start)->toDayDateTimeString()}}
                                        - {{\Carbon\Carbon::parse($schedule->end)->toDayDateTimeString()}}</span><br>
                                                <a href="{{route('delete_event', $schedule->id)}}" class="btn-sm mt-2 btn btn-danger">
                                                    DELETE
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <hr class="container-m-nx my-4">


                                </div>
                            </div>
                            <!-- /Calendar Sidebar -->

                            <!-- Calendar & Modal -->
                            <div class="col app-calendar-content">
                                <div class="card shadow-none border-0">
                                    <div class="card-body pb-0 mb-5">
                                        <h4 class="text-center btn btn-lg btn-success text-white">
                                            {{\Illuminate\Support\Str::upper($month->name)}} {{$year}}
                                        </h4>
                                        <!-- FullCalendar -->
                                        <div id="calendar">
                                            <table>
                                                <thead>
                                                <tr>
                                                    <th class="text-center mb-3 box">Sun</th>
                                                    <th class="text-center mb-3 box">Mon</th>
                                                    <th class="text-center mb-3 box">Tue</th>
                                                    <th class="text-center mb-3 box">Wed</th>
                                                    <th class="text-center mb-3 box">Thur</th>
                                                    <th class="text-center mb-3 box">Fri</th>
                                                    <th class="text-center mb-3 box">Sat</th>
                                                </tr>
                                                </thead>
                                                <?php

                                                $sun = \App\Models\Day::where(['month_id'=> $month->id])->where(['name'=> 'Sunday'])->get();
                                                $mon = \App\Models\Day::where(['month_id'=> $month->id])->where(['name'=> 'Monday'])->get();
                                                $tue = \App\Models\Day::where(['month_id'=> $month->id])->where(['name'=> 'Tuesday'])->get();
                                                $wed = \App\Models\Day::where(['month_id'=> $month->id])->where(['name'=> 'Wednesday'])->get();
                                                $thur = \App\Models\Day::where(['month_id'=> $month->id])->where(['name'=> 'Thursday'])->get();
                                                $fri = \App\Models\Day::where(['month_id'=> $month->id])->where(['name'=> 'Friday'])->get();
                                                $sat = \App\Models\Day::where(['month_id'=> $month->id])->where(['name'=> 'Saturday'])->get();

                                                ?>
                                                <tbody>
                                                {{-- @for($i = 0; $i < 5; $i++)

                                                     <tr>
                                                         <td class="box1  text-center">
                                                              @if($i < count($sun))
                                                              {{$sun[$i]->day}}
                                                                  @else *
                                                              @endif
                                                          </td>
                                                         <td class="box1  text-center">
                                                              @if($i < count($mon))
                                                              {{$mon[$i]->day}}
                                                                  @else *
                                                              @endif
                                                          </td>
                                                         <td class="box1  text-center">
                                                              @if($i < count($tue))
                                                              {{$tue[$i]->day}}
                                                                  @else *
                                                              @endif
                                                          </td>
                                                         <td class="box1  text-center">
                                                              @if($i < count($wed))
                                                              {{$wed[$i]->day}}
                                                                  @else *
                                                              @endif
                                                          </td>

                                                         <td class="box1  text-center">
                                                              @if($i < count($thur))
                                                              {{$thur[$i]->day}}
                                                                  @else *
                                                              @endif
                                                          </td>
                                                         <td class="box1  text-center">
                                                              @if($i < count($fri))
                                                              {{$fri[$i]->day}}
                                                                  @else *
                                                              @endif
                                                          </td>
                                                         <td class="box1  text-center">
                                                              @if($i < count($sat))
                                                              {{$sat[$i]->day}}
                                                                  @else *
                                                              @endif
                                                          </td>



                                                  </tr>
                                                 @endfor--}}
                                                <tr>
                                                    <td>

                                                        <ul style="list-style-type: none;">
                                                            @foreach($sun as $data)
                                                                <li class="box1  text-center">
                                                                    @if($data->day == \Carbon\Carbon::now()->day)
                                                                        <span class="badge bg-success">
                                                                 {{$data->day}}
                                                            </span>
                                                                    @else  {{$data->day}}
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul style="list-style-type: none;">
                                                            @foreach($mon as $data)
                                                                <li class="box1  text-center">
                                                                    @if($data->day == \Carbon\Carbon::now()->day)
                                                                        <span class="badge bg-success">
                                                                 {{$data->day}}
                                                            </span>
                                                                    @else  {{$data->day}}
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul style="list-style-type: none;">
                                                            @foreach($tue as $data)
                                                                <li class="box1  text-center">
                                                                    @if($data->day == \Carbon\Carbon::now()->day)
                                                                        <span class="badge bg-success">
                                                                 {{$data->day}}
                                                            </span>
                                                                    @else  {{$data->day}}
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul style="list-style-type: none;">
                                                            @foreach($wed as $data)
                                                                <li class="box1  text-center">
                                                                    @if($data->day == \Carbon\Carbon::now()->day)
                                                                        <span class="badge bg-success">
                                                                 {{$data->day}}
                                                            </span>
                                                                    @else  {{$data->day}}
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul style="list-style-type: none;">
                                                            @foreach($thur as $data)
                                                                <li class="box1  text-center">
                                                                    @if($data->day == \Carbon\Carbon::now()->day)
                                                                        <span class="badge bg-outline-success">
                                                                 {{$data->day}}
                                                            </span>
                                                                    @else  {{$data->day}}
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul style="list-style-type: none;">
                                                            @foreach($fri as $data)
                                                                <li class="box1  text-center">
                                                                    @if($data->day == \Carbon\Carbon::now()->day)
                                                                        <span class="badge btn-sm btn-secondary">
                                                                 {{$data->day}}
                                                            </span>
                                                                    @else  {{$data->day}}
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul style="list-style-type: none;">
                                                            @foreach($sat as $data)
                                                                <li class="box1  text-center">
                                                                    @if($data->day == \Carbon\Carbon::now()->day)
                                                                        <span class="badge bg-success">
                                                                 {{$data->day}}
                                                            </span>
                                                                    @else  {{$data->day}}
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>

                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="app-overlay"></div>
                                <!-- FullCalendar Offcanvas -->
                                <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1" id="addEventSidebar" aria-labelledby="addEventSidebarLabel">
                                    <div class="offcanvas-header border-bottom">
                                        <h5 class="offcanvas-title mb-2" id="addEventSidebarLabel">Add Event</h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <form action="{{route('create_event')}}" method="post" class="event-form pt-0">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label" for="eventTitle">Title</label>
                                                <input type="text" class="form-control" required name="title" placeholder="Title" />
                                                <input type="text" hidden  value="{{$month->id}}" required name="month_id"  />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="eventLabel">Label </label>
                                                <select class="select2 select-event-label form-select" id="eventLabel" required name="tag">
                                                    <option data-label="primary" value="primary" selected> Virtual Meeting</option>
                                                    <option data-label="danger" value="danger">Event </option>
                                                    <option data-label="warning" value="warning">Statutory Meeting</option>
                                                    <option data-label="success" value="success">Forum</option>
                                                    <option data-label="info" value="info">Physical Meeting</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="eventStartDate">Start Date</label>
                                                <input type="datetime-local" required class="form-control" id="eventStartDate" name="start" placeholder="Start Date" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="eventEndDate">End Date</label>
                                                <input type="datetime-local" class="form-control" required id="eventEndDate" name="end" placeholder="End Date" />
                                            </div>

                                            <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                                                <div>
                                                    <button type="submit" class="btn btn-success btn-add-event me-sm-3 me-1">Create</button>
                                                    <button type="reset" class="btn btn-label-secondary btn-cancel me-sm-0 me-1" data-bs-dismiss="offcanvas">Cancel</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /Calendar & Modal -->
                        </div>
                    </div>

                    <div class="col-md-12  mb-5">
                        <div class="card-body">
                            <h1  class="text-center card-header"> {{$year}} Calender</h1>

                            <div class="row">
                                @foreach($months as $item)
                                    <div id="" class="col-md-6">
                                        <div class="col app-calendar-content">
                                            <div class="card shadow-none border-0">
                                                <div class="card-body pb-0 mb-5">
                                                    <h4 class="text-center btn btn-lg btn-success text-white">
                                                        {{\Illuminate\Support\Str::upper($item->name)}} {{$year}}
                                                    </h4>
                                                    <!-- FullCalendar -->
                                                    <div id="calendar">
                                                        <table>
                                                            <thead>
                                                            <tr>
                                                                <th class="text-center mb-3 box">Sun</th>
                                                                <th class="text-center mb-3 box">Mon</th>
                                                                <th class="text-center mb-3 box">Tue</th>
                                                                <th class="text-center mb-3 box">Wed</th>
                                                                <th class="text-center mb-3 box">Thur</th>
                                                                <th class="text-center mb-3 box">Fri</th>
                                                                <th class="text-center mb-3 box">Sat</th>
                                                            </tr>
                                                            </thead>
                                                                <?php
                                                                $current_days = \App\Models\Day::where(['month_id'=> $item->id])->get();
                                                                $sun = \App\Models\Day::where(['month_id'=> $item->id])->where(['name'=> 'Sunday'])->get();
                                                                $mon = \App\Models\Day::where(['month_id'=> $item->id])->where(['name'=> 'Monday'])->get();
                                                                $tue = \App\Models\Day::where(['month_id'=> $item->id])->where(['name'=> 'Tuesday'])->get();
                                                                $wed = \App\Models\Day::where(['month_id'=> $item->id])->where(['name'=> 'Wednesday'])->get();
                                                                $thur = \App\Models\Day::where(['month_id'=> $item->id])->where(['name'=> 'Thursday'])->get();
                                                                $fri = \App\Models\Day::where(['month_id'=> $item->id])->where(['name'=> 'Friday'])->get();
                                                                $sat = \App\Models\Day::where(['month_id'=> $item->id])->where(['name'=> 'Saturday'])->get();

                                                                ?>
                                                            <tbody>
                                                            {{-- @for($i = 0; $i < 5; $i++)

                                                                 <tr>
                                                                     <td class="box  text-center">
                                                                         @if($i < count($sun))
                                                                             {{$sun[$i]->day}}
                                                                         @else *
                                                                         @endif
                                                                     </td>
                                                                     <td class="box  text-center">
                                                                         @if($i < count($mon))
                                                                             {{$mon[$i]->day}}
                                                                         @else *
                                                                         @endif
                                                                     </td>
                                                                     <td class="box  text-center">
                                                                         @if($i < count($tue))
                                                                             {{$tue[$i]->day}}
                                                                         @else *
                                                                         @endif
                                                                     </td>
                                                                     <td class="box  text-center">
                                                                         @if($i < count($wed))
                                                                             {{$wed[$i]->day}}
                                                                         @else *
                                                                         @endif
                                                                     </td>

                                                                     <td class="box  text-center">
                                                                         @if($i < count($thur))
                                                                             {{$thur[$i]->day}}
                                                                         @else *
                                                                         @endif
                                                                     </td>
                                                                     <td class="box  text-center">
                                                                         @if($i < count($fri))
                                                                             {{$fri[$i]->day}}
                                                                         @else *
                                                                         @endif
                                                                     </td>
                                                                     <td class="box  text-center">
                                                                         @if($i < count($sat))
                                                                             {{$sat[$i]->day}}
                                                                         @else *
                                                                         @endif
                                                                     </td>



                                                                 </tr>
                                                             @endfor--}}
                                                            <tr>
                                                                <td>

                                                                    <ul style="list-style-type: none;">
                                                                        @foreach($sun as $data)
                                                                            <li class="box1  text-center">
                                                                                {{$data->day}}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <ul style="list-style-type: none;">
                                                                        @foreach($mon as $data)
                                                                            <li class="box1  text-center">
                                                                                {{$data['day']}}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <ul style="list-style-type: none;">
                                                                        @foreach($tue as $data)
                                                                            <li class="box1  text-center">
                                                                                {{$data['day']}}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <ul style="list-style-type: none;">
                                                                        @foreach($wed as $data)
                                                                            <li class="box1  text-center">
                                                                                {{$data['day']}}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <ul style="list-style-type: none;">
                                                                        @foreach($thur as $data)
                                                                            <li class="box1  text-center">
                                                                                {{$data['day']}}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <ul style="list-style-type: none;">
                                                                        @foreach($fri as $data)
                                                                            <li class="box1  text-center">
                                                                                {{$data['day']}}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <ul style="list-style-type: none;">
                                                                        @foreach($sat as $data)
                                                                            <li class="box1  text-center">
                                                                                {{$data['day']}}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>

                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-overlay"></div>
                                            <!-- FullCalendar Offcanvas -->
                                            <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1" id="addEventSidebar" aria-labelledby="addEventSidebarLabel">
                                                <div class="offcanvas-header border-bottom">
                                                    <h5 class="offcanvas-title mb-2" id="addEventSidebarLabel">Add Event</h5>
                                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                </div>
                                                <div class="offcanvas-body">
                                                    <form class="event-form pt-0" id="eventForm" onsubmit="return false">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="eventTitle">Title</label>
                                                            <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="Event Title" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="eventLabel">Label </label>
                                                            <select class="select2 select-event-label form-select" id="eventLabel" name="eventLabel">
                                                                <option data-label="primary" value="primary" selected> Virtual Meeting</option>
                                                                <option data-label="danger" value="danger">Event </option>
                                                                <option data-label="warning" value="warning">Statutory Meeting</option>
                                                                <option data-label="success" value="success">Forum</option>
                                                                <option data-label="info" value="info">Physical Meeting</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="eventStartDate">Start Date</label>
                                                            <input type="datetime-local" class="form-control" id="eventStartDate" name="eventStartDate" placeholder="Start Date" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="eventEndDate">End Date</label>
                                                            <input type="datetime-local" class="form-control" id="eventEndDate" name="eventEndDate" placeholder="End Date" />
                                                        </div>

                                                        <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                                                            <div>
                                                                <button type="submit" class="btn btn-success btn-add-event me-sm-3 me-1">Create</button>
                                                                <button type="reset" class="btn btn-label-secondary btn-cancel me-sm-0 me-1" data-bs-dismiss="offcanvas">Cancel</button>
                                                            </div>
                                                            <div><button class="btn btn-label-danger btn-delete-event d-none">Delete</button></div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
                    <div class="row">
                        @foreach($months as $item)

                        <div class="col-md-4">
                         <?php
                                   $monthly_schedule = \App\Models\Schedule::where([
                                       'month_id'=> $item->id
                                   ])->get();

                                    ?>
                            @if(count($monthly_schedule) > 0)

                                <div class="p-4">
                                    <h4 class="mb-4 text-center">
                                        <span class="btn btn-success">
                                            {{ \Illuminate\Support\Str::upper($item->name.' '.'Events')}}
                                        </span>
                                    </h4>
                                    <ul style="list-style-type:none; ">
                                        @if(!$monthly_schedule)
                                            <p class="mb-3">
                                                No Schedules
                                            </p>
                                        @endif
                                        @foreach($monthly_schedule as $schedule)
                                            <li class="mb-3" style="border:solid;padding:15px;border-width:1px;">
                                                <span class="badge bg-{{$schedule->tag}} mb-3">{{\App\Models\Day::find($schedule->days_id)?->day}}</span>
                                                <span class="mb-3 text-center"><b>{{$schedule->title}}</b></span><br>
                                                <span class="mb-3 text-center">{{\Carbon\Carbon::parse($schedule->start)->toDayDateTimeString()}}
                                        - {{\Carbon\Carbon::parse($schedule->end)->toDayDateTimeString()}}</span><br>
                                                <a href="{{route('delete_event', $schedule->id)}}" class="btn-sm mt-2 btn btn-danger">
                                                    DELETE
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>


                                </div>
                                @endif

                        </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>

    </div>


    <style>

        .box{

            padding: 20px;
            margin-left:35%;
        }
        .box1{
            padding: 15px;

        }
    </style>
@endsection
