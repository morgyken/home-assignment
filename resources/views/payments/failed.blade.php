@extends('layouts.current-template')

    @section('title')

    Payment Success

    @endsection

    @section('content')


    <h1> Payment Success</h1>


   <a href="{{ route('queston_det', ['question_id' => $question_id])}}"> Continue to the hime page  </a>


    @endsection