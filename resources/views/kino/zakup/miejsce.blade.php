@extends('layouts.app')
@section('content')

    <nav class="nav nav-pills nav-fill">

        <a class="nav-link disabled">Wybierz Miejsca do rezerwacji ! </a>

    </nav>

   <div class="container">
       <form method="POST" action="{{ route('kup.podsumowanie', ['seans' =>$seans->id ])  }}">

           <nav class="nav nav-pills nav-fill">
               <button type="submit" id="podsumowanie" class="btn btn-primary col col-12 col-sm-12 col-md-12 col-lg-12 mb-5 d-none ">
                   Podsumowanie!
               </button>
           <a class="nav-link disabled">Ekran</a><br>

       </nav>
       <div class="grid" style="display: grid;
           background-color: #0f5132;
grid-template-columns: repeat({{$max->max}}, 0.5fr);
grid-template-rows: repeat({{$ilerzedow->max}}, 0.5fr);
           grid-column-gap: 0px;
           grid-row-gap: 0px;
          ">
        @for($i=1;$i<$ilerzedow->max+1;$i++)
           @for($j=1;$j<$max->max+1;$j++)
                   @php
                       $flag=0;
                   @endphp
                @foreach($miejsca as $miejsce)
                    @if($miejsce->nr_na_grid ==$j and$miejsce->rzad ==$i  )
                        @foreach($bilety as $bilet)
                            @if($bilet->sean->data_seansu>=today()and$bilet->miejsca_id==$miejsce->id)
                                      <div  style=" grid-area: {{$i}} / {{$j}} / {{$i+1}} / {{$j+1}};


                   "class="zarezerwowane" >
                                          {{$miejsce->nr}}
                                         </div>
                                   @php
                                       $flag=1;
                                   @endphp
                                @break
                               @endif
                           @endforeach
                       @if($flag==0)

                            <div  style=" grid-area: {{$i}} / {{$j}} / {{$i+1}} / {{$j+1}};


                                "class="{{$miejsce->rodzaj}}" >
                                {{$miejsce->nr}}
                                <input name="miejsca[]"  class="form-check-input" type="checkbox" value="{{$miejsce->id}}" id="flexCheckDefault">
                            </div>
                                @php
                                    $flag=0;
                                @endphp
                            @else
                                @php
                                    $flag=0;
                                @endphp
                           @break
                            @endif
                       @endif
                   @endforeach
           @endfor
       @endfor
   </div>


    </form>

   </div>
    <br>

    <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link disabled " style="color: black;
            background-color: #a4071d;" aria-current="page" >Zarezerwowane</a>
        <a class="flex-sm-fill text-sm-center nav-link disabled" style="color: black;
            background-color: purple;" href="#">VIP</a>
        <a class="flex-sm-fill text-sm-center nav-link disabled" style="color: black;
            background-color: green;" href="#">Normalne</a>
        <a class="flex-sm-fill text-sm-center nav-link disabled" style="color: black;
            background-color: #0a53be;">Ulgowe</a>
    </nav>
@endsection
@section('javascript')
    var countChecked = function() {
    var n = $( "input:checked" ).length;
    if(n>0)
    $( "#podsumowanie" ).removeClass("d-none");
    else if(n==0)
    $( "#podsumowanie" ).addClass("d-none");
    };

    $( "input[type=checkbox]" ).on( "click", countChecked );

@endsection

