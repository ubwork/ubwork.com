@extends('errors::layoput')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Website bị chặn truy cập'))
