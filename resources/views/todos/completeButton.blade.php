@if ($todo->completed)
    <button type="button" class="btn btn-sm btn-success m-1" onclick="event.preventDefault();document.getElementById('form-incomplete-{{$todo->id}}').submit()">&check;</button>

    <form id="{{'form-incomplete-' . $todo->id}}" action="{{route('todo.incomplete', $todo->id)}}" method="post" style="display: none">
        @csrf
        @method('delete')
    </form>
@else
    <button type="button" class="btn btn-sm btn-secondary m-1" onclick="event.preventDefault();document.getElementById('form-complete-{{$todo->id}}').submit()">&check;</button>

    <form id="{{'form-complete-' . $todo->id}}" action="{{route('todo.complete', $todo->id)}}" method="post" style="display: none">
        @csrf
        @method('put')
    </form>
@endif