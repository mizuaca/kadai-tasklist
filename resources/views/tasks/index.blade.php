@extends('layouts.app')

@section('content')

    @if (Auth::check())
        <?php $user = Auth::user(); ?>
        <h1>{{ $user->name }}のタスク一覧</h1>
         @if(count($tasks)>0)
          
           <table class="table table-hover">
            <thead>
              <tr>
                <th>id</th>
                <th>status</th>
                <th>task</th>
              </tr>
            </tgead>
            <tbody>
              @foreach($tasks as $task)
                <tr>
                <td>{!! link_to_route('tasks.show',$task->id,['id' => $task->id]) !!}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->content }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @endif
          {!! link_to_route('tasks.create','新規タスクの追加',null,['class'=>'btn btn-default']) !!}       
    
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the TaskLists</h1>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif


@endsection