@if(count($tasks)>0)
  <?php $user = $micropost->user; ?>
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