@extends('layouts.app')

@section('content')
    
        <div class="col-md-6 col-lg-6">
            <div class="card ">
                <div class="card-header text-white bg-primary">Companies <a class="float-right btn btn-primary" href="/companies/create"> Create a new Company</a></div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($companies as $company)
                        <li class="list-group-item"><a href="/companies/{{ $company->id }}">{{ $company->name }}</a></li>
                        @endforeach
                        </ul>
                </div>
            </div>    
        </div>
@endsection

 