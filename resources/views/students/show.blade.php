
@extends('students.layout')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Student Details</h2>
                    </div>

                      <div class="card-body">
                        <h5 class="card-title">Name: {{ $students->name }}</h5>
                        <p class="card-text">Class: {{ $students->class }}</p>
                        <p class="card-text">Roll: {{ $students->roll }}</p>
                        <p class="card-text">Section: {{ $students->section }}</p>
                      </div>
                </div>
            </div>

        </div>
    </div>
@endsection
