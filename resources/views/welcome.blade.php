@extends('layouts.main')

@section('content')
    <div class="element">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('apply') }}" class="btn btn-primary">Apply</a>
            </div>
        </div>
        {{--<div class="image keep-the-ball"></div>--}}
        {{--<div class="info">--}}
            {{--<h2>Išsaugok kamuolį</h2>--}}
                            {{--<span class="info">--}}
                                {{--Populiariausias 2015 m. Balandžio mėn. žaidimas Lietuvoje--}}
                            {{--</span>--}}
            {{--<p>--}}
                {{--Žaidime turite piešti linijas per kurias ridenasi kamuoliukas,--}}
                {{--bet tai ne taip jau ir paprasta - kamuoliukas negali nei "iškristi"--}}
                {{--iš telefono ekrano nei per ilgai užsibūti ant linijos.--}}
            {{--</p>--}}
            {{--<div class="links">--}}
                {{--<a href="https://play.google.com/store/apps/details?id=com.kiberzauras.keeptheball"--}}
                   {{--title="Įsigyti per Google Play"--}}
                   {{--target="_blank">--}}
                    {{--<img src="/assets/images/get-googleplay.png" alt=" " />--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection