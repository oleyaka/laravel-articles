@extends('layouts.app')

<ul>
    @foreach ($sections as $section)
        <li><a href="/{{ $section->name }}">{{ $section->name }}</a></li>
    @endforeach
</ul>
