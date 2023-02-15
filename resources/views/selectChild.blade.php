<?php $dash.='-- '; ?>
@foreach($childs as $child)
    <option value="{{$child->id}}">{{$dash}}{{$child->name}}</option>
    @if(count($child->childs))
        @include('selectChild',['childs' => $child->childs])
    @endif
@endforeach
