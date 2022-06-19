@extends('errors::minimal')

@section('title', '404 - '.$exception->getMessage())
@section('code', '404')
@section('message', $exception->getMessage())
