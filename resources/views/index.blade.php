@extends('layout/main')
@section('title', 'EvenTake - Get your special event')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info mt-3" role="alert">
                <h4 class="alert-heading">Welcome !!</h4>
                <p>EvenTake is a platform that displays a variety of events held in Jakarta. You can choose events by category and register.</p>
                <hr>
                <p class="mb-0">Good Luck & Have Fun <i class="fas fa-check-circle"></i></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @foreach($data as $row)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="{{ $row['img_event'] }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $row['title_event']}}</h5>
                                <p class="card-text">{{ $row['desc_event'] }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ date('d F Y', strtotime($row['date_event'])) }}</li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="btn btn-primary">Booking</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

