<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}">
  <link href="{{ asset('user/css/lol.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:Condensed" />
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
                @include('user/layouts/head')

</head>
<body>
     @include('user/layouts/header')

  <!-- Header -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">Sportinės veiklos</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5 text-uppercase">valdymo sistema</h2>
      </div>
    </div>
  </header>


  <header class="cd-main-header text-center flex flex-column flex-center mt-5">

    <h1 class="text-xl">Tvarkaraštis</h1>
    

    <h6> 
                <button disabled style="border: none; color: #00acac;
                                            padding: 1px 8px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 9px;
                                            margin-top: 3px;
                                            background-color: transparent;
                                            border-radius:3px"
                ><b><i class="fas fa-check"></i></b></button> - užsiregistravote sėkmingai;
    </h6>
   
  </header>
  <div class="cd-schedule cd-schedule--loading mt-2 margin-bottom-lg js-cd-schedule">
    <div class="cd-schedule__timeline">
      <ul>
        <li><span>09:00</span></li>
        <li><span>09:30</span></li>
        <li><span>10:00</span></li>
        <li><span>10:30</span></li>
        <li><span>11:00</span></li>
        <li><span>11:30</span></li>
        <li><span>12:00</span></li>
        <li><span>12:30</span></li>
        <li><span>13:00</span></li>
        <li><span>13:30</span></li>
        <li><span>14:00</span></li>
        <li><span>14:30</span></li>
        <li><span>15:00</span></li>
        <li><span>15:30</span></li>
        <li><span>16:00</span></li>
        <li><span>16:30</span></li>
        <li><span>17:00</span></li>
        <li><span>17:30</span></li>
        <li><span>18:00</span></li>
      </ul>
    </div> <!-- .cd-schedule__timeline -->
  
    <div class="cd-schedule__events">
      <ul>
        <li class="cd-schedule__group">
       
        <div class="cd-schedule__top-info"><b><p>{{$today}}</p></b></div>
          <ul>
              @foreach($live_rezervacijas as $live_rezervacija)
                   @if($live_rezervacija->statusas == 1 && $live_rezervacija->treniruotes_data == $today)
        <form role="form" action="{{ route('user_live_rezervacija_store')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <li class="cd-schedule__event">
              <a style="padding:5px!important" data-start="{{$live_rezervacija->laikas_nuo}}" data-end="{{$live_rezervacija->laikas_iki}}" data-content="event-abs-circuit"  data-event="event-1"  type="button" style="cursor: default;">
                <em class="cd-schedule__name"  style="line-height: 13px;">
                    @foreach ($treniruotes as $treniruote)
                        @if ($live_rezervacija->treniruotes_id == $treniruote->id)
                          {{$treniruote->treniruotespavadinimas}} 
                        @endif
                     @endforeach
                   
                </em>
                           <input type="text" name="live_rezervacijos_id" class="form-control" id="live_rezervacijos_id" value="{{$live_rezervacija->id}}" style="display:none">
                      @if (!Auth::guest())
                      @if($user_live_rezervacijas->where('user_id', '=', auth()->user()->id)->where('live_rezervacijos_id', '=', $live_rezervacija->id)->count()<=0)
                     <button type="submit" style="border: none; color: white;
                                            padding: 4px 8px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 12px;
                                            margin-top: 3px;
                                            background-color: #E7D2CC;
                                            border-radius:3px"
                ><b><i class="fas fa-plus"></i></b></button>
                    @else
                    <button disabled style="border: none; color: #00acac;
                                            padding: 1px 8px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 9px;
                                            margin-top: 3px;
                                            background-color: transparent;
                                            border-radius:3px"
                ><b><i class="fas fa-check"></i></b></button>
                 @endif
                     @endif
              </a>

            </li>
                           
            </form>   
         @endif
             @endforeach
            
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><b><p>{{$tomorrow}}</p></b></div>
 
          <ul>
             @foreach($live_rezervacijas as $live_rezervacija)
                   @if($live_rezervacija->statusas == 1 && $live_rezervacija->treniruotes_data == $tomorrow)
                   <form role="form" action="{{ route('user_live_rezervacija_store')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <li class="cd-schedule__event"  style="position:relative!important">
              <a style="padding:5px!important" data-start="{{$live_rezervacija->laikas_nuo}}" data-end="{{$live_rezervacija->laikas_iki}}"  data-event="event-1" style="cursor: default;" href="#0">
                <em class="cd-schedule__name"  style="line-height: 13px;">
                    @foreach ($treniruotes as $treniruote)
                        @if ($live_rezervacija->treniruotes_id == $treniruote->id)
                          {{$treniruote->treniruotespavadinimas}}
                        @endif
                     @endforeach
                     
                </em>
                  
                     <input type="text" name="live_rezervacijos_id" class="form-control" id="live_rezervacijos_id" value="{{$live_rezervacija->id}}" style="display:none">
                       @if (!Auth::guest())
                                             @if($user_live_rezervacijas->where('user_id', '=', auth()->user()->id)->where('live_rezervacijos_id', '=', $live_rezervacija->id)->count()<=0)

           <button type="submit" style="border: none; color: white;
                                            padding: 4px 8px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 12px;
                                            margin-top: 3px;
                                            background-color: #E7D2CC;
                                            border-radius:3px"
                ><b><i class="fas fa-plus"></i></b></button>
                    @else
                    <button disabled style="border: none; color: #00acac;
                                            padding: 1px 8px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 9px;
                                            margin-top: 3px;
                                            background-color: transparent;
                                            border-radius:3px"
                ><b><i class="fas fa-check"></i></b></button>
                            @endif
                            @endif
              </a>
            </li>
             </form>   
            @endif
             @endforeach
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><b><p>{{$day2}}</p></b></div>
  
          <ul>
           @foreach($live_rezervacijas as $live_rezervacija)
                   @if($live_rezervacija->statusas == 1 && $live_rezervacija->treniruotes_data == $day2)
                   <form role="form" action="{{ route('user_live_rezervacija_store')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <li class="cd-schedule__event">
              <a style="padding:5px!important" data-start="{{$live_rezervacija->laikas_nuo}}" data-end="{{$live_rezervacija->laikas_iki}}"  data-event="event-1" style="cursor: default;" href="#0">
                <em class="cd-schedule__name"  style="line-height: 13px;">
                    @foreach ($treniruotes as $treniruote)
                        @if ($live_rezervacija->treniruotes_id == $treniruote->id)
                          {{$treniruote->treniruotespavadinimas}}
                        @endif
                     @endforeach
                   
                </em>
                 
                  <input type="text" name="live_rezervacijos_id" class="form-control" id="live_rezervacijos_id" value="{{$live_rezervacija->id}}" style="display:none">
                  @if (!Auth::guest())
                                        @if($user_live_rezervacijas->where('user_id', '=', auth()->user()->id)->where('live_rezervacijos_id', '=', $live_rezervacija->id)->count()<=0)

                      <button type="submit" style="border: none; color: white;
                                            padding: 4px 8px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 12px;
                                            margin-top: 3px;
                                            background-color: #E7D2CC;
                                            border-radius:3px"
                ><b><i class="fas fa-plus"></i></b></button>
                    @else
                    <button disabled style="border: none; color: #00acac;
                                            padding: 1px 8px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 9px;
                                            margin-top: 3px;
                                            background-color: transparent;
                                            border-radius:3px"
                ><b><i class="fas fa-check"></i></b></button>
                            @endif
                            @endif
              </a>
            </li>
             </form>   
            @endif
             @endforeach
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><b><p>{{$day3}}</p></b></div>
  
          <ul>
            @foreach($live_rezervacijas as $live_rezervacija)
                   @if($live_rezervacija->statusas == 1 && $live_rezervacija->treniruotes_data == $day3)
                   <form role="form" action="{{ route('user_live_rezervacija_store')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <li class="cd-schedule__event">
              <a style="padding:5px!important" data-start="{{$live_rezervacija->laikas_nuo}}" data-end="{{$live_rezervacija->laikas_iki}}"  data-event="event-1" style="cursor: default;" href="#0">
                <em class="cd-schedule__name"  style="line-height: 13px;">
                    @foreach ($treniruotes as $treniruote)
                        @if ($live_rezervacija->treniruotes_id == $treniruote->id)
                          {{$treniruote->treniruotespavadinimas}}
                        @endif
                     @endforeach
                     
                </em>
                  
                                             <input type="text" name="live_rezervacijos_id" class="form-control" id="live_rezervacijos_id" value="{{$live_rezervacija->id}}" style="display:none">

                       @if (!Auth::guest())
                                             @if($user_live_rezervacijas->where('user_id', '=', auth()->user()->id)->where('live_rezervacijos_id', '=', $live_rezervacija->id)->count()<=0)

               <button type="submit" style="border: none; color: white;
                                            padding: 4px 8px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 12px;
                                            margin-top: 3px;
                                            background-color: #E7D2CC;
                                            border-radius:3px"
                ><b><i class="fas fa-plus"></i></b></button>
                    @else
                    <button disabled style="border: none; color: #00acac;
                                            padding: 1px 8px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 9px;
                                            margin-top: 3px;
                                            background-color: transparent;
                                            border-radius:3px"
                ><b><i class="fas fa-check"></i></b></button>
                            @endif
                            @endif
              </a>
            </li>
             </form>   
            @endif
             @endforeach
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><b><p>{{$day4}}</p></b></div>
  
          <ul>
           @foreach($live_rezervacijas as $live_rezervacija)
                   @if($live_rezervacija->statusas == 1 && $live_rezervacija->treniruotes_data == $day4)
                   <form role="form" action="{{ route('user_live_rezervacija_store')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <li class="cd-schedule__event">
              <a style="padding:5px!important" data-start="{{$live_rezervacija->laikas_nuo}}" data-end="{{$live_rezervacija->laikas_iki}}"  data-event="event-1" style="cursor: default;" href="#0">
                <em class="cd-schedule__name"  style="line-height: 13px;">
                    @foreach ($treniruotes as $treniruote)
                        @if ($live_rezervacija->treniruotes_id == $treniruote->id)
                          {{$treniruote->treniruotespavadinimas}}
                        @endif
                     @endforeach
                     
                </em>
                   
                                             <input type="text" name="live_rezervacijos_id" class="form-control" id="live_rezervacijos_id" value="{{$live_rezervacija->id}}" style="display:none">

                       @if (!Auth::guest())
                                             @if($user_live_rezervacijas->where('user_id', '=', auth()->user()->id)->where('live_rezervacijos_id', '=', $live_rezervacija->id)->count()<=0)

                     <button type="submit" style="border: none; color: white;
                                            padding: 4px 8px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 12px;
                                            margin-top: 3px;
                                            background-color: #E7D2CC;
                                            border-radius:3px"
                ><b><i class="fas fa-plus"></i></b></button>
                    @else
                    <button disabled style="border: none; color: #00acac;
                                            padding: 1px 8px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 9px;
                                            margin-top: 3px;
                                            background-color: transparent;
                                            border-radius:3px"
                ><b><i class="fas fa-check"></i></b></button>
                            @endif
                            @endif
              </a>
            </li>
             </form>   
            @endif
             @endforeach
          </ul>
        </li>
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><b><p>{{$day5}}</p></b></div>
  
          <ul>
            @foreach($live_rezervacijas as $live_rezervacija)
                   @if($live_rezervacija->statusas == 1 && $live_rezervacija->treniruotes_data == $day5)
                   <form role="form" action="{{ route('user_live_rezervacija_store')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <li class="cd-schedule__event">
              <a style="padding:5px!important" data-start="{{$live_rezervacija->laikas_nuo}}" data-end="{{$live_rezervacija->laikas_iki}}"  data-event="event-1" style="cursor: default;" href="#0">
                <em class="cd-schedule__name"  style="line-height: 13px;">
                    @foreach ($treniruotes as $treniruote)
                        @if ($live_rezervacija->treniruotes_id == $treniruote->id)
                          {{$treniruote->treniruotespavadinimas}}
                        @endif
                     @endforeach
                     
                </em>
                 
                                             <input type="text" name="live_rezervacijos_id" class="form-control" id="live_rezervacijos_id" value="{{$live_rezervacija->id}}" style="display:none">

                       @if (!Auth::guest())
                     @if($user_live_rezervacijas->where('user_id', '=', auth()->user()->id)->where('live_rezervacijos_id', '=', $live_rezervacija->id)->count()<=0)
                 <button type="submit" style="border: none; color: white;
                                            padding: 4px 8px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 12px;
                                            margin-top: 3px;
                                            background-color: #E7D2CC;
                                            border-radius:3px"
                ><b><i class="fas fa-plus"></i></b></button>
                    @else
                    <button disabled style="border: none; color: #00acac;
                                            padding: 1px 8px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 9px;
                                            margin-top: 3px;
                                            background-color: transparent;
                                            border-radius:3px"
                ><b><i class="fas fa-check"></i></b></button>
                            @endif
                              @endif
              </a>
            </li>
             </form>   
            @endif
             @endforeach
          </ul>
        </li>
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><b><p>{{$day6}}</p></b></div>
          <ul>
            @foreach($live_rezervacijas as $live_rezervacija)
                   @if($live_rezervacija->statusas == 1 && $live_rezervacija->treniruotes_data == $day6)
                   <form role="form" action="{{ route('user_live_rezervacija_store')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <li class="cd-schedule__event">
              <a style="padding:5px!important" data-start="{{$live_rezervacija->laikas_nuo}}" data-end="{{$live_rezervacija->laikas_iki}}"  data-event="event-1" style="cursor: default;" href="#0">
                <em class="cd-schedule__name"  style="line-height: 13px;">
                    @foreach ($treniruotes as $treniruote)
                        @if ($live_rezervacija->treniruotes_id == $treniruote->id)
                          {{$treniruote->treniruotespavadinimas}}
                        @endif
                     @endforeach
                   
                </em>
             
                                             <input type="text" name="live_rezervacijos_id" class="form-control" id="live_rezervacijos_id" value="{{$live_rezervacija->id}}" style="display:none">

                       @if (!Auth::guest())
                                             @if($user_live_rezervacijas->where('user_id', '=', auth()->user()->id)->where('live_rezervacijos_id', '=', $live_rezervacija->id)->count()<=0)

                     <button type="submit" style="border: none; color: white;
                                            padding: 4px 8px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 12px;
                                            margin-top: 3px;
                                            background-color: #E7D2CC;
                                            border-radius:3px"
                ><b><i class="fas fa-plus"></i></b></button>
                    @else
                    <button disabled style="border: none; color: #00acac;
                                            padding: 1px 8px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 9px;
                                            margin-top: 3px;
                                            background-color: transparent;
                                            border-radius:3px"
                ><b><i class="fas fa-check"></i></b></button>
                            @endif
                            @endif
              </a>
            </li>
             </form>   
            @endif
             @endforeach
          </ul>
        </li>
      </ul>
    </div>

    <div class="cd-schedule-modal">
      <header class="cd-schedule-modal__header">
        <div class="cd-schedule-modal__content">
          <span class="cd-schedule-modal__date"></span>
          <h3 class="cd-schedule-modal__name"></h3>
        </div>
  
        <div class="cd-schedule-modal__header-bg"></div>
      </header>
  
      <div class="cd-schedule-modal__body">
        <div class="cd-schedule-modal__event-info"></div>

        <div class="cd-schedule-modal__body-bg"></div>
      </div>
  
      <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
    </div>
  
    <div class="cd-schedule__cover-layer"></div>
  </div> <!-- .cd-schedule -->
  <script src="{{ asset('user/assets/js/util.js') }}"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="{{ asset('user/assets/js/main.js') }}"></script>
  @include('user/layouts/footer')

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('user/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{ asset('user/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{ asset('user/js/grayscale.min.js') }}"></script>

 <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
    <script>
function change(){
    document.getElementById("myselect").submit();
}
</script>
</body>
</html>