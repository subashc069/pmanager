@extends('layout')

@section('content')
    <h1>{{$project->title}}</h1>
    <div>
        <a href="/projects/{{$project->id}}/edit">Edit</a>
    </div>
    <div>
        {{$project->description}}
    </div>
    @if ($project->tasks->count())
        <div>
            @foreach ($project->tasks as $task)

            <div>
                <form action="/completed-tasks/{{ $task->id}}" method="POST" >
                    @if ($task->completed)
                        @method('DELETE')
                    @endif
                    @csrf
                    <label for="completed" class="{{$task->completed ? 'is-complete' : ''}}" >
                        <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked': ''}}>
                        {{ $task->description}}
                    </label>
                </form>
            </div>
            @endforeach
        </div>   
    @endif
    {{-- add new task form --}}
    <form action="/projects/{{$project->id}}/tasks" method="post">
        @csrf
        
        <div>
            <label for="description">New Task</label>
            <div>
                <input type="text" name="description" placeholder="New Task" required>
            </div>
        </div>

        <div>
            <button type="submit">Add Task</button>
        </div>
        
        @include('errors')

    </form>
    
@endsection