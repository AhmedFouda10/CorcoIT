{{-- @foreach ($childs as $child)
    <option value="{{ $child->id}}">{{ $child->name }}
        
        @if (count($child->childs))
            @include('selectChild', ['childs' => $child->childs])
        @endif
    </option>
@endforeach --}}



{{-- @foreach ($category->childs as $sub)
    <option value="{{ $sub->id }}">-{{ $sub->name }}
    </option>
    @foreach ($sub->childs as $subsub)
        <option value="{{ $subsub->id }}">
            --{{ $subsub->name }}</option>
    @endforeach
@endforeach --}}
